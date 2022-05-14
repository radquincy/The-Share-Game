<!DOCTYPE html>
<?php 

require('../extras/important/needed.php') ;
//conect to the database
require ('../extras/important/connect.php');
$_SESSION['lose'] = true;
?>

<head>
    <title>Shares Game - Game</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<body game>

<!--sidebar-->

<form method='POST' id="sidebar">
    
        <input type="submit" name="nextday" value="Next Day!">
        <input type="button" onclick="location='pets.php'" value="Pets Menu">
        <?php 
            if (!empty($_SESSION['pets'])){
                echo 'Pet Selected: '.$_SESSION['pets'];
            }else{
                echo 'No Pet Selected';
            }
        ?>
        <input type="submit" name='save' value="Save and Quit">
        <input type="button" onclick="javascript:resetGame();" value="Reset Game">
    
</form>

<!--main content-->
<div id="main">
    <!--Headings-->
    <div class="topheadingmaingame"><img src="../images/logo2.png" style="width: 120px;"></div>
    
<div id="main_content"> 
<?php


//collect data from database and check if its the same as your pc name
$data = mysqli_query($connection,"SELECT * FROM savegame WHERE UserKey = '$userkey';");
$info = mysqli_fetch_array( $data );


if (!empty($_SESSION['session'])){
    //money

    @$money = $_SESSION['money'];
    //sale1
    @$sale1price = $_SESSION['sale1price'];
    @$sale1 = $_SESSION['sale1'];
    //sale2
    @$sale2price = $_SESSION['sale2price'];
    @$sale2 = $_SESSION['sale2'];
    //day
    @$day = $_SESSION['day'];
    //rent
    @$rentprice = $_SESSION['rentprice'];
    @$rentday = $_SESSION['rentday'];
    //last price +/-
    @$sale1pricelast = $_SESSION['sale1pricelast'];
    @$sale2pricelast = $_SESSION['sale2pricelast'];
}



if(empty($_SESSION['session'])){
    $_SESSION['session'] = 1;

    require_once '../extras/load.php';
    $networth = 0;

    
    if(!empty($_SESSION['money'])){
        @$money = $_SESSION['money'];
    }
    if(!empty($_SESSION['rentprice'])){
        @$rentprice = $_SESSION['rentprice'];
    }
}


//rent day ----- Lose Game
    if ($rentday < 1)   {
        if ($money >= $rentprice)   {
            $money = $money - $rentprice;
            $rentprice = $rentprice * 3;
            round($rentprice,0);
            round($money,0);
            $rentday = 30;
            /*echo "<div class='warning'>Money for Rent was Taken</div>";*/
            echo "
            <div class=\"note_warn\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Money for Rent was Taken!
            </div>";
        }else{
            header("Location: lose.php");
            
        }
    }



//what each button does
require('../extras/button_functions.php');


//nextday
if (isset($_POST["nextday"])){
    $day++;
    $rentday--;
    floor($rentprice);
    floor($money);

    require("../extras/pets/pet_function.php");
    require("../extras/price_change.php");

}

    //price cant be less then 1
    if ($sale1price < 1) {
        $sale1price = 1;
    }
    if ($sale2price < 1) {
        $sale2price = 1;
    }

    require("../extras/num_letters/money.php");

    require("../extras/num_letters/share1.php");
    require("../extras/num_letters/share2.php");
    
    require("../extras/num_letters/rent_price.php");

    
?>

<br><br>
<form method="post">
<article id="TopBar">
    <section id="Day">
        Day: <?php echo $day?>
    </section>
    <section id="RentDue">
        Rent due in:<?php echo $rentday?> Days
    </section>
    <section id="RentPrice">
        Rent Price: $<?php echo $rentpriceL?>
    </section>
    <section id="Money">
        <!-- $m is the letter number to number money-->
        Money: $<?php echo $moneyL ?>
    </section>
</article>


<!--Sale1--><br>
Share 1 price:$<?php echo $sale1price?><br>
Share 1 Owned:<?php echo $sale1L?><br>
<input type="submit" name="buysale1" value="Buy Share 1! (x1)">
<input type="submit" name="sellsale1" value="Sell Share 1! (x1)"><br>
<input type="submit" name="buysale1%50" value="Buy Share 1! (50%)">
<input type="submit" name="sellsale1%50" value="Sell Share 1! (50%)"><br>
<input type="submit" name="buysale1MAX" value="Buy Share 1! (MAX)">
<input type="submit" name="sellsale1MAX" value="Sell Share 1! (MAX)"><br>
<input type="submit" name="sellsale1rent" value="Sell Share 1! (Rent Price)">

<!--Sale2--><br><br>
Share 2 price:$<?php echo $sale2price?><br>
Share 2 Owned:<?php echo $sale2L?><br>
<input type="submit" name="buysale2" value="Buy share 2! (x1)">
<input type="submit" name="sellsale2" value="Sell Share 2! (x1)"><br>
<input type="submit" name="buysale2%50" value="Buy Share 2! (50%)">
<input type="submit" name="sellsale2%50" value="Sell Share 2! (50%)"><br>
<input type="submit" name="buysale2MAX" value="Buy Share 2! (MAX)">
<input type="submit" name="sellsale2MAX" value="Sell Share 2! (MAX)"><br>
<input type="submit" name="sellsale2rent" value="Sell Share 2! (Rent Price)">
</form>


 
<!--save the last price +/- for each sale
<input type="hidden" name="sale1pricelast" value="?php echo $sale1pricelast ?>">
<input type="hidden" name="sale2pricelast" value="?php echo $sale2pricelast ?>">
-->
<?php 
//calculate networth
$networth = ($sale1 * $sale1price) + ($sale2 * $sale2price) + $money; 

require("../extras/num_letters/net_worth.php");
?>




<!--javascript to confirm the reset of the game-->
<script>
function resetGame(){
    var r = confirm("Do You Want to Reset Your Game");
    if (r == true) {
    location.href = "lose.php";}}
</script>

<?php
//update database
if (isset($_POST["nextday"]) || isset($_POST["save"])){

if ($info['UserKey'] == $userkey){
mysqli_query ($connection,"UPDATE savegame SET day = '$day', rentduein = '$rentday', rentprice = '$rentprice', money = '$money', share1price = '$sale1price', share1owned = '$sale1',share1pricelast = '$sale1pricelast', share2price = '$sale2price', share2owned = '$sale2',share2pricelast = '$sale2pricelast' WHERE UserKey = '$userkey'");

}else{
mysqli_query ($connection,"INSERT INTO savegame (UserKey,day,rentduein,rentprice,money,share1price,share1owned,share1pricelast,share2price,share2owned,share2pricelast) 
VALUES('$userkey','$day','$rentday','$rentprice','$money','$sale1price','$sale1','$sale1pricelast','$sale2price','$sale2','$sale2pricelast')");
}
}

if (isset($_POST['save'])){
    //has the game been saved?
    @$_SESSION['session'] = null;
    //net worth 
    @$_SESSION['networth'] = null;
    $_SESSION['networthL'] = null;
    //money
    @$_SESSION['money'] = null;
    //sale1
    @$_SESSION['sale1price'] = null;
    @$_SESSION['sale1'] = null;
    //sale2
    @$_SESSION['sale2price'] = null;
    @$_SESSION['sale2'] = null;
    //day
    @$_SESSION['day'] = null;
    //rent
    @$_SESSION['rentprice'] = null;
    @$_SESSION['rentday'] = null;
    //last price +/-
    @$_SESSION['sale1pricelast'] = null;
    @$_SESSION['sale2pricelast'] = null;
    header( "refresh:1; url=home.php");

}

//send number of days survived to the you lose page

    //networth calc for when you lose  
    $_SESSION['networth'] = $networth;
    $_SESSION['networthL'] = $networthL;
    //money
    @$_SESSION['money'] = $money;
    //sale1
    @$_SESSION['sale1price'] = $sale1price;
    @$_SESSION['sale1'] = $sale1;
    //sale2
    @$_SESSION['sale2price'] = $sale2price;
    @$_SESSION['sale2'] = $sale2;
    //day
    @$_SESSION['day'] = $day;
    //rent
    @$_SESSION['rentprice'] = $rentprice;
    @$_SESSION['rentday'] = $rentday;
    //last price +/-
    @$_SESSION['sale1pricelast'] = $sale1pricelast;
    @$_SESSION['sale2pricelast'] = $sale2pricelast;

    ?>
</div>
</div>


</body>
</html>
<!DOCTYPE html> 
<?php 
require('../extras/important/require_me.php');
$_SESSION['lose'] = true;
?>

<body game>

<!--sidebar-->
<form method='POST' id="sidebar">
    
        <input type="submit" name="nextday" value="Next Day!">
        <input type="button" onclick="location='pets.php'" value="Pets Menu">
        <?php 
            if (!empty(@$_SESSION['pets'] && @$_SESSION['pets'] !== 'none')){
                echo 'Pet Selected: '.$_SESSION['pets'];
                $pet_img = $_SESSION['pets'];
                echo "<img src='../images/pets/$pet_img.png' style='width: 120px;'>";
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
    @$pet = $_SESSION['pets'];
    
    @$game_mode = $_SESSION['game_mode'];
}

if(empty($day)){
    $day = 0;
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


//PETS
require('../extras/pets/validate_pet.php');
if ($day == 0){
    // $_SESSION['pet_usage'] = [0]=phoenix [1]=snake
    $_SESSION['pet_usage'] = array(false, false);
    $_SESSION['piggy_bank'] = 0;
}

//? Pet Unlocking

        $user_pet_data = mysqli_query($connection,"SELECT * FROM sg_pets WHERE UserKey = '$userkey';");
        $user_pet_info = mysqli_fetch_array( $user_pet_data );

    
    if($money >= 1000000){
        if($user_pet_info['goldfish'] == 0){
            mysqli_query ($connection,"UPDATE sg_pets SET goldfish = 1 WHERE UserKey = '$userkey'");
            echo "<div class=\"note_good\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                You Unlocked the Goldfish pet!
            </div>";
        }
    }
    if($money >= 1000000000){
        if($user_pet_info['bird'] == 0){
            mysqli_query ($connection,"UPDATE sg_pets SET bird = 1 WHERE UserKey = '$userkey'");
            echo "<div class=\"note_good\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                You Unlocked the Bird pet!
            </div>";
        }
    }
    if($money >= pow(10,15)){
        if($user_pet_info['pig'] == 0){
            mysqli_query ($connection,"UPDATE sg_pets SET pig = 1 WHERE UserKey = '$userkey'");
            echo "<div class=\"note_good\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                You Unlocked the Pig pet!
            </div>";
        }
    }



//rent day ----- Lose Game
    if ($rentday < 1)   {
        if ($money >= $rentprice)   {
                        
            $money = $money - $rentprice;
            $rentprice = $rentprice * 3;

            require("../extras/pets/pet_function_rent.php");

            if (empty($rent_price_discount)){
                $rent_price_discount = 0;
            }
            if (empty($rent_price_increase)){
                $rent_price_increase = 0;
            }
            if (empty($rent_day_change)){
                $rent_day_change = 0;
            }

            //pet discounts for rent price
            $rentprice = $rentprice + @$rent_price_increase;
            $rentprice = $rentprice - @$rent_price_discount;

            
            $rentday = 30;
            $rentday = $rentday + @$rent_day_change;
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

    floor($rentprice);
    floor($money);

//what each button does
require('../extras/button_functions.php');


//nextday
if (isset($_POST["nextday"])){
    $day++;
    $rentday--;
    floor($rentprice);
    floor($money);

    require("../extras/pets/pet_function_day.php");
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

  //? day based pets 
  if($day >= 100){
    if($user_pet_info['monkey'] == 0){
        mysqli_query ($connection,"UPDATE sg_pets SET monkey = 1 WHERE UserKey = '$userkey'");
        echo "<div class=\"note_good\">
            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
            You Unlocked the Monkey pet!
        </div>";
    }
}
if($day >= 2555){
    if($user_pet_info['rock'] == 0){
        mysqli_query ($connection,"UPDATE sg_pets SET rock = 1 WHERE UserKey = '$userkey'");
        echo "<div class=\"note_good\">
            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
            You Unlocked the Rock pet!
        </div>";
    }
} 
if($day >= 1000 && $game_mode == '1dollar'){
    if($user_pet_info['rock'] == 0){
        mysqli_query ($connection,"UPDATE sg_pets SET rock = 1 WHERE UserKey = '$userkey'");
        echo "<div class=\"note_good\">
            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
            You Unlocked the Rock pet!
        </div>";
    }
} 
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
<input type="submit" name="buysale1" value="Buy Share 1! (x1)" id='game_button'>
<input type="submit" name="sellsale1" value="Sell Share 1! (x1)" id='game_button'><br>
<input type="submit" name="buysale1%50" value="Buy Share 1! (50%)" id='game_button'>
<input type="submit" name="sellsale1%50" value="Sell Share 1! (50%)" id='game_button'><br>
<input type="submit" name="buysale1MAX" value="Buy Share 1! (MAX)" id='game_button'>
<input type="submit" name="sellsale1MAX" value="Sell Share 1! (MAX)" id='game_button'><br>
<input type="submit" name="sellsale1rent" value="Sell Share 1! (Rent Price)" id='game_button'>

<!--Sale2--><br><br>
Share 2 price:$<?php echo $sale2price?><br>
Share 2 Owned:<?php echo $sale2L?><br>
<input type="submit" name="buysale2" value="Buy share 2! (x1)" id='game_button'>
<input type="submit" name="sellsale2" value="Sell Share 2! (x1)" id='game_button'><br>
<input type="submit" name="buysale2%50" value="Buy Share 2! (50%)" id='game_button'>
<input type="submit" name="sellsale2%50" value="Sell Share 2! (50%)" id='game_button'><br>
<input type="submit" name="buysale2MAX" value="Buy Share 2! (MAX)" id='game_button'>
<input type="submit" name="sellsale2MAX" value="Sell Share 2! (MAX)" id='game_button'><br>
<input type="submit" name="sellsale2rent" value="Sell Share 2! (Rent Price)" id='game_button'>
</form>


 
<!--save the last price +/- for each sale
<input type="hidden" name="sale1pricelast" value="?php echo $sale1pricelast ?>">
<input type="hidden" name="sale2pricelast" value="?php echo $sale2pricelast ?>">
-->
<?php 
//calculate networth
$networth = ($sale1 * $sale1price) + ($sale2 * $sale2price) + $money; 

require("../extras/num_letters/net_worth.php");

$piggy_bank = $_SESSION['piggy_bank'];
if(empty(@$piggy_bank)){
    $piggy_bank = 0;
}else{
}

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
mysqli_query ($connection,"UPDATE savegame SET day = '$day', rentduein = '$rentday', rentprice = '$rentprice', money = '$money', share1price = '$sale1price', share1owned = '$sale1',share1pricelast = '$sale1pricelast', share2price = '$sale2price', share2owned = '$sale2',share2pricelast = '$sale2pricelast', last_pet = '$pet', piggy_bank = '$piggy_bank', game_mode = '$game_mode' WHERE UserKey = '$userkey'");
}else{
mysqli_query ($connection,"INSERT INTO savegame (UserKey,day,rentduein,rentprice,money,share1price,share1owned,share1pricelast,share2price,share2owned,share2pricelast,last_pet,piggy_bank,game_mode) 
VALUES('$userkey','$day','$rentday','$rentprice','$money','$sale1price','$sale1','$sale1pricelast','$sale2price','$sale2','$sale2pricelast','$pet','$piggy_bank','$game_mode')");
}
//save the stats on the game you are playing
    if($day > 0 && $networth > 0){
        $last_rent = $_SESSION['rentprice'] / 3;
        $score = $networth / $day + $last_rent;
        $score = round($score);
    }else{
        $score = 0;
    }
    
    $data589 = mysqli_query($connection,"SELECT * FROM sg_stats WHERE UserKey = '$userkey';");
    @$info589 = mysqli_fetch_array( $data589 );

    if ($info589['UserKey'] == $userkey){
        if ($info589['high_score'] > $score){
            $HighScore = $info589['high_score'];
        }else{
            $HighScore = $score;
        }
        if ($info589['highest_day'] > $day){
            $HighestDay = $info589['highest_day'];
        }else{
            $HighestDay = $day;
        }
        
        if ($info589['highest_networth'] > $networth){
            $HighestNetWorth = $info589['highest_networth'];
        }else{
            $HighestNetWorth = $networth;
        }

        mysqli_query ($connection,"UPDATE sg_stats SET high_score = '$HighScore', highest_day = '$HighestDay', highest_networth = '$HighestNetWorth' WHERE UserKey = '$userkey'");
    }else{
        mysqli_query ($connection,"INSERT INTO sg_stats (UserKey, high_score, highest_day, highest_networth) VALUES('$userkey','$score','$day','$networth')");
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

    @$_SESSION['piggy_bank'] = $piggy_bank;

    ?>
</div>
</div>


</body>
</html>
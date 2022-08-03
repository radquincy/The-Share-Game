<!DOCTYPE html> 
<?php 
require('../extras/important/require_me.php');
$_SESSION['lose'] = true;
require('../extras/assets/game_parts/side_bar.php');
require_once("../extras/assets/num_letter.php")
?>

<body game>

<!--sidebar-->
    <?php ?>
<!--main content-->
<div id="main">
    <!--Headings-->
    <div class="topheadingmaingame"><img src="../images/logo2.png" style="width: 120px;"></div>
    
<div id="main_content"> 
<?php

    $info = savegame_key($userkey,$connect);


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
    $user_pet_info = sg_pets_key($userkey, $connect);
    
    if($money >= 1000000){
        if($user_pet_info['goldfish'] == 0){
            unlock_pets($userkey, $connect, 'goldfish');
            notification('good','You Unlocked the Goldfish pet!');
        }
    }
    if($money >= 1000000000){
        if($user_pet_info['bird'] == 0){
            unlock_pets($userkey, $connect, 'bird');
            notification('good','You Unlocked the Bird pet!');

        }
    }
    if($money >= pow(10,15)){
        if($user_pet_info['pig'] == 0){
            unlock_pets($userkey, $connect, 'pig');
            notification('good','You Unlocked the Pig pet!');
        }
    }

    //rent day ----- Lose Game
        require('../extras/rent_day.php');

    //what each button does
        require('../extras/button_functions.php');

     
    //nextday
    if (isset($_POST["nextday"])){
        $day++;
        $rentday--;
        $rentprice = floor($rentprice);
        $money = floor($money);

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


        $moneyL = num_to_letter($money);

        $sale1L = num_to_letter($sale1);
        $sale2L = num_to_letter($sale2);
        
        $rentpriceL = num_to_letter($rentprice);

    //? day based pets 
    if($day >= 100){
        if($user_pet_info['monkey'] == 0){
            unlock_pets($userkey, $connect, 'monkey');
            notification('good','You Unlocked the Monkey pet!');

        }
    }
    if($day >= 2555){
        if($user_pet_info['rock'] == 0){
            unlock_pets($userkey, $connect, 'rock');
            notification('good','You Unlocked the Rock pet!');

        }
    } 
    if($day >= 1000 && $game_mode == '1dollar'){
        if($user_pet_info['turtle'] == 0){
            unlock_pets($userkey, $connect, 'turtle');
            notification('good','You Unlocked the Turtle pet!');

        }
    } 

    //require main buttons and pets
    require('../extras/assets/game_parts/main_buttons.php');

    //calculate networth
    $networth = ($sale1 * $sale1price) + ($sale2 * $sale2price) + $money; 

    $networthL = num_to_letter($networth);

    $piggy_bank = $_SESSION['piggy_bank'];
    if(empty(@$piggy_bank)){
        $piggy_bank = 0;
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
mysqli_query ($connect,"UPDATE sg_save SET day = '$day', rentduein = '$rentday', rentprice = '$rentprice', money = '$money', share1price = '$sale1price', share1owned = '$sale1',share1pricelast = '$sale1pricelast', share2price = '$sale2price', share2owned = '$sale2',share2pricelast = '$sale2pricelast', last_pet = '$pet', piggy_bank = '$piggy_bank', game_mode = '$game_mode' WHERE UserKey = '$userkey'");
}else{
mysqli_query ($connect,"INSERT INTO sg_save (UserKey,day,rentduein,rentprice,money,share1price,share1owned,share1pricelast,share2price,share2owned,share2pricelast,last_pet,piggy_bank,game_mode) 
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
    
    $info589 = user_stats($userkey,$connect);

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

        mysqli_query ($connect,"UPDATE sg_stats SET high_score = '$HighScore', highest_day = '$HighestDay', highest_networth = '$HighestNetWorth' WHERE UserKey = '$userkey'");
    }else{
        mysqli_query ($connect,"INSERT INTO sg_stats (UserKey, high_score, highest_day, highest_networth) VALUES('$userkey','$score','$day','$networth')");
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
    @$_SESSION['piggy_bank'] = null;
    
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
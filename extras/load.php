<!DOCTYPE html>
<?php 
    require('important/require_me.php');

    //share price random calculation
   $sale1price = rand(15,70);
   $sale2price = rand(15,70);

//collect data from database and check if its the same as your pc name
$data = mysqli_query($connect,"SELECT * FROM savegame WHERE UserKey = '$userkey';");
$info = mysqli_fetch_array( $data );

if ($info['UserKey'] == $userkey && $info['day'] > 0) {
    //money
    @$money = $info['money'];
    //sale1
    @$sale1price = $info['share1price'];
    @$sale1 = $info['share1owned'];
    //sale2
    @$sale2price = $info['share2price'];
    @$sale2 = $info['share2owned'];
    //day
    @$day = $info['day'];
    //rent
    @$rentprice = $info['rentprice'];
    @$rentday = $info['rentduein'];
    //last price +/-
    @$sale1pricelast = $info['share1pricelast']; 
    @$sale2pricelast = $info['share2pricelast'];
    //last pet
    $_SESSION['pets'] = $info['last_pet'];
    $pet = $_SESSION['pets'];
    //piggy bank
    $_SESSION['piggy_bank'] = $info['piggy_bank'];
    //game mode
    @$_SESSION['game_mode'] = $info['game_mode'];
    $game_mode = $_SESSION['game_mode'];
    
}else{
    @$money = 500;
    @$day = 0;
    @$rentday = 30;
    @$rentprice = 100;
    @$sale1 = 0;
    @$sale2 = 0;
    @$calc1sale1 = 0;
    @$calc2sale1 = 0;
    @$calc1sale2 = 0;
    @$calc2sale2 = 0;
    @$m = 0;
    @$n = 0;
    @$r = 0;
    @$sale1pricelast = 0;
    @$sale2pricelast = 0;
    @$networth = 0;
    @$sale1x = 0;
    @$sale2x = 0;
    @$pet = '';
}

if ($info['UserKey'] == $userkey){
    mysqli_query ($connect,"UPDATE savegame SET day = '$day', rentduein = '$rentday', rentprice = '$rentprice', money = '$money', share1price = '$sale1price', share1owned = '$sale1',share1pricelast = '$sale1pricelast', share2price = '$sale2price', share2owned = '$sale2',share2pricelast = '$sale2pricelast', last_pet = '$pet' WHERE UserKey = '$userkey'");
    
    }else{

    mysqli_query ($connect,"INSERT INTO savegame (UserKey,day,rentduein,rentprice,money,share1price,share1owned,share1pricelast,share2price,share2owned,share2pricelast,last_pet) VALUES ('$userkey','$day','$rentday','$rentprice','$money','$sale1price','$sale1','$sale1pricelast','$sale2price','$sale2','$sale2pricelast','$pet')");
    }

    

?>
</body>
</html>
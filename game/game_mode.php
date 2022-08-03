<!DOCTYPE html>
<?php require('../extras/important/require_me.php'); ?>

<?php
    $data = mysqli_query($connect,"SELECT * FROM sg_save WHERE UserKey = '$userkey';");
    $info = mysqli_fetch_array( $data );

    if($info['day'] > 0){
        header("Location: game.php");
    }

?>

<div class="topheading"><img src="../images/logo2.png" style="width: 200px;"><br>
Pick a Game Mode
</div>

<style>
    input[type="submit"]{
        width: 12vw;
        height: 6vh;
        font-size: 1em;
    }
    input[type="button"]{
        width: 12vw;
        height: 6vh;
        font-size: 1em;
    }



</style>


<br>
<form method="POST">
<div class="tooltip">
    <input type="submit" name="normal" value="normal difficulty">
        <span class="tooltiptext_mode">
            normal difficulty<br>
            the normal game mode
        </span>
</div><br>

<div class="tooltip">
    <input type="submit" name="hard" value="Hard difficulty">
        <span class="tooltiptext_mode">
            start with $100 instead of $500
            everything else is the same as normal mode
        </span>
</div><br>

<div class="tooltip">
    <input type="submit" name="1dollar" value="$1 challenge">
        <span class="tooltiptext_mode">
            start with $1 and a rent price of $1
            everything else is the same as normal mode
        </span>
</div><br>
</form>


<p>Random difficulty (coming soon)</p>
<!--<input type="button" name="normal" value=""><br>-->
<br><br><br>
<a href='home.php'>
    <input type="button" id='home' name='home' value='Home'>
</a>


<?php

if(isset($_POST['normal'])){
    $_SESSION['game_mode'] = 'normal';
    header("Location: game.php");
}
if(isset($_POST['hard'])){
    $_SESSION['money'] = 100;
    $_SESSION['game_mode'] = 'hard';
    header("Location: game.php");
}
if(isset($_POST['1dollar'])){
    $_SESSION['money'] = 1;
    $_SESSION['rentprice'] = 1;
    $_SESSION['game_mode'] = '1dollar';
    header("Location: game.php");

}


?>
<!DOCTYPE html>
<?php require('../extras/important/needed.php');?>
<?php require('../extras/important/connect.php');?>

<?php
    $data = mysqli_query($connection,"SELECT * FROM savegame WHERE UserKey = '$userkey';");
    $info = mysqli_fetch_array( $data );

    if($info['day'] > 0){
        header("Location: game.php");
    }


?>
<head>
    <title>Shares Game - Select Mode</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<div class="topheading"><img src="../images/logo2.png" style="width: 200px;"><br>
Pick a Game Mode
</div>

<br>
<form method="POST">
<div class="tooltip">
    <input type="submit" name="normal" value="normal difficulty">
        <span class="tooltiptext">
            normal difficulty<br>
            the normal game mode
        </span>
</div><br>

<div class="tooltip">
    <input type="submit" name="hard" value="Hard difficulty">
        <span class="tooltiptext">
            start with $100 instead of $500
            everything else is the same as normal mode
        </span>
</div><br>

<div class="tooltip">
    <input type="submit" name="1dollar" value="$1 challenge">
        <span class="tooltiptext">
            start with $1 and a rent price of $1
            everything else is the same as normal mode
        </span>
</div><br>
</form>


<p>Random difficulty (coming soon)</p>
<!--<input type="button" name="normal" value=""><br>-->

<a href='home.php'>
    <input type="button" id='home' name='home' value='Home'>
</a>


<?php

if(isset($_POST['normal'])){
    header("Location: game.php");
}
if(isset($_POST['hard'])){
    $_SESSION['money'] = 100;
    header("Location: game.php");
}
if(isset($_POST['1dollar'])){
    $_SESSION['money'] = 1;
    $_SESSION['rentprice'] = 1;
    
    header("Location: game.php");

}


?>
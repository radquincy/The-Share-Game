<!DOCTYPE html>
<?php require('extras/important/require_me.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shares Game - Versions</title>
</head>
<body>
    <div class="topheading"><img src="images/logo2.png" style="width: 200px;"><br>Versions</div>

<br><br>
<form method="post">
<input type="button" onclick="location='game/home.php'" value="Home Page">
</form>
<!--//versions-->
<?php require ("version_files/v6.html"); ?>
<br><br>
<?php require ("version_files/v5.html"); ?>
<br><br>
<?php require ("version_files/v4.html"); ?>
<br><br>
<?php require ("version_files/v3.html"); ?>
<br><br>
<?php require ("version_files/v2.html"); ?>
<br><br>
<?php require ("version_files/v1.html"); ?>


<br><br>
<div class="topheading">Betas</div>
<br>
<!--//betas-->
<?php require ("version_files/beta/v3beta.html"); ?>

<!--

<h2>Future ideas</h2>

<p>Reward players to progress further in the game<br>
Make the Game Look Better<br>
To add in some hidden easter eggs<br>
More Game Modes<br>
Each player to have save slots<br>
Different Colour palets that you can select from<br>
more Pets<br>
</p>  

-->
<br><br>

<form method="post">
<input type="button" onclick="location='game/home.php'" value="Home Page">
</form>
<br><br><br><br>

</body>
</html>
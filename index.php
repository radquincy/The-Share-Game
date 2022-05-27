<?php 
session_start();
session_destroy(); 
?>


<!DOCTYPE html>
    <link rel="stylesheet" href="css/stylesheet.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shares Game</title>
</head>
<body style="text-align: center">
    <!--Headings-->
    <div class="topheading">
        <img src="images/logo2.png" style="width: 200px;">
        <p>Version: 6.0 Pre-6</p>
        <!--//!<img id="VersionOverlay" src="images/logo/6-0 version.png">-->
    </div>

    <br><br>

    <form method="post">
        <p><input type="button" onclick="location='account/sign_in.php'" value="Sign In">
        Or
        <input type="button" onclick="location='account/create_account.php'" value="Create Account"></p>
    </form>

    <br><br>

    <form method="post">
        <p>Or look at our resources</p>
        <input type="button" onclick="location='versions_page.php'" value="All Game Versions and Changes">
        <br>
        <input type="button" onclick="location='howto.php'" value="How to Play and Tips">
    </form>

</body>
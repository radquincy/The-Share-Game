<?php 
session_start();
session_destroy(); 
require('extras/important/require_me.php');
?>


<!DOCTYPE html>
<head>
    <title>Shares Game</title>
</head>
<body style="text-align: center">
    <!--Headings-->
    <div class="topheading">
        <img src="images/logo2.png" style="width: 200px;">
        <p>Version: <?php echo $game_version ?></p>
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
        <input type="button" onclick="location='how_to.php'" value="How to Play and Tips">
    </form>

</body>
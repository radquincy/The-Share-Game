<!DOCTYPE html>
<?php require('extras/important/require_me.php'); ?>

<body>
    <div class="topheading"><img src="images/logo2.png" style="width: 200px;"><br>How To Play and Tips</div>

<br><br>
<form method="post">
<input type="button" onclick="location='game/home.php'" value="Home Page">
</form>
<br><br>
<!--how to play-->
<?php require ("version_files/how_to/how_to_play.html"); ?>
<br><br>

<!--tips-->
<?php require ("version_files/how_to/tips.html"); ?>
<br><br>

<form method="post">
<input type="button" onclick="location='game/home.php'" value="Home Page">
</form>
<br><br><br><br>

</body>
</html>
<!DOCTYPE html>
<link rel="stylesheet" href="../css/stylesheet.css">
<?php require('../extras/important/needed.php');

//delete all save stuff
    //has the game been saved by session?
    @$_SESSION['session'] = null;
    //net worth 
    @$_SESSION['networth'] = null;
    @$_SESSION['networthL'] = null;
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

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shares Game - Home</title>
</head>
<body>
    <!--Headings-->
    <div class="topheading"><img src="../images/logo2.png" style="width: 200px;"></div>

    


<div style="margin: 1%;">
<?php
echo "<h2 style='font-size: 18px; text-align: left;'>". $username."</h2>";
?>

<input style="float: left;" type="button" onclick="location='../account/account.php'" value="Settings">
<input style="float: left;" type="button" onclick="location='../index.php'" value="Log Out">
</div>


<!--<p style="font-size: 18px;">The Shares Game is a game where you buy and sell shares to make money. If you dont make enough money by the end ot the rent period you lose</p>-->
<br><br><br><br>


<form method="post">
<input style='font-size: 22.5px'type="button" onclick="location='game_mode.php'" value="     Start the Game     "><br>
<input type="button" onclick="location='leader.php'" value="Public Leaderboard">
</form> 

<br><br><br><br><br>
<h3>Version 6.0 Pre-2</h3>

<form method="post">
<input type="button" onclick="location='../versions_page.php'" value="All Game Versions and Changes">
<br>
<input type="button" onclick="location='../howto.php'" value="How to Play and Tips">
</form>

</body>
</html>
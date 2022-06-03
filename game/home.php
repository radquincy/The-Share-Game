<!DOCTYPE html>
<link rel="stylesheet" href="../css/stylesheet.css">
<?php require('../extras/important/require_me.php');

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

    <?php
    echo "<div class=\"note_medium\">
            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
            Warning, this is a pre release and there can be many problems, uncompleted features and items that shouldn't be in the game. if you find any bugs <a href='../account/report.php'> Please Report them here</a>
        </div>";   
    ?>


<div style="margin: 1%;">


<input style="float: left;" type="button" onclick="location='../account/account.php'" value="Settings">
<input style="float: left;" type="button" onclick="location='../index.php'" value="Log Out">
<input style="float: left;" type="button" onclick="location='../account/report.php'" value="Report a Bug">

<?php
echo "<br><br><h2 style='font-size: 18px; text-align: left;'> Welcome, ". $username."!</h2>";
?>
</div>


<!--<p style="font-size: 18px;">The Shares Game is a game where you buy and sell shares to make money. If you dont make enough money by the end ot the rent period you lose</p>-->
<br><br><br><br>


<form method="post">
<input style='font-size: 22.5px'type="button" onclick="location='game_mode.php'" value="     Start the Game     "><br>
<input type="button" onclick="location='leader.php'" value="Public Leaderboard">
</form> 

<br><br><br><br><br>
<h3>Version 6.0 Pre-6</h3>

<form method="post">
<input type="button" onclick="location='../versions_page.php'" value="All Game Versions and Changes">
<br>
<input type="button" onclick="location='../howto.php'" value="How to Play and Tips">
</form>

</body>
</html>
<!DOCTYPE html>
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
    //piggy bank
    @$_SESSION['piggy_bank'] = null;
    //pets
    @$_SESSION['pets'] = 'none';
    //game mode
    @$_SESSION['game_mode'] = null;

?>

<body>
    <!--Headings-->
    <div class="topheading"><img src="../images/logo2.png" style="width: 200px;"></div>

    <?php
    //notifications:
  
    ?>


<div style="margin: 1%;">


<button id='square_button' onclick="location='../account/account.php'"> 
    <img id='icon' src='../images/icon/settings-sliders.png'> 
</button>

<button id='square_button' onclick="location='../index.php'">
    <img id='icon' src='../images/icon/power.png'> 
</button>

<button id='square_button' onclick="location='../account/report.php'">
    <img id='icon' src='../images/icon/bug.png'> 
</button>

<?php
echo "<br><br><br><h2 style='font-size: 18px; text-align: left;'> Welcome, ". $username."!</h2>";
?>
</div>


<!--<p style="font-size: 18px;">The Shares Game is a game where you buy and sell shares to make money. If you dont make enough money by the end ot the rent period you lose</p>-->
<br><br><br>


<form method="post">
<input style='font-size: 22.5px'type="button" onclick="location='game_mode.php'" value="     Start the Game     "><br>
<input type="button" onclick="location='leader.php'" value="Public Leaderboard">
</form> 

<br><br><br><br><br>
<h3>Version <?php echo $game_version; ?></h3>

<form method="post">
<input type="button" onclick="location='../versions_page.php'" value="All Game Versions and Changes">
<br>
<input type="button" onclick="location='../how_to.php'" value="How to Play and Tips">
</form>

</body>
</html>
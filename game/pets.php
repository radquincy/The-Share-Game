<!DOCTYPE html>
<?php
require_once('../extras/important/needed.php');
@session_start();
?>
<link rel="stylesheet" href="../css/stylesheet.css">

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shares Game - Pets</title>
</head>
<body>
<!--Headings-->
<div class="topheading"><img src="../images/logo2.png" style="width: 200px;"></div>

<?php
echo "<div class=\"note_warn\">
<span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
all available pets will be unlocked until it is closer to the full release where you have to unlock them (they will be wiped)
</div>";

?>
<br><br>
<h1>Pets</h1>

<input type="button" onclick="location='game.php'" value="Back To Game">
<br>

<!--select pet-->
<form method="POST">
    <select name="pets" id="pets" class='pets' style="width:15%" required>
        <option value="">Select an option</option>
        <option value="dog">Dog</option>
        <option value="rock">Rock</option>    
        <option value="bird">Bird</option>
        <option value="cat">Cat</option>  
        <option value="goldfish">Goldfish</option>
        <option value="monkey">Monkey</option>
        <option value="turtle">Turtle</option>
    </select>
    <input type='submit' name='confirm_pet' value='Confirm Pet'>
</form>

<?php
    if(isset($_POST['pets'])){
        $_SESSION['pets'] = $_POST['pets'];
        echo 'you changed your pet to: '.$_SESSION['pets'];
    }
?>


<br><br>

<div id='pet_grid'>
    <div class="tooltip" >
        Dog<img src="../images/pets/dog.png" style="width: 100%;">
        <span class="tooltiptext" id='left'>
  	        -Can Commonly give you $10 - $100<br>
            -Can Uncommonly permanently increase the rent price by $5 - $50
        </span>
    </div>
    <div class="tooltip">
        Cat<img src="../images/pets/cat.png" style="width: 100%;">
        <span class="tooltiptext">
            -50% of the time Gives you a 5% discount to rent price<br>
            -But can uncommonly increase rent price permanently by 0-7.5% 

        </span>
    </div>
    <div class="tooltip">
        Goldfish<img src="../images/pets/goldfish.png" style="width: 100%;">
        <span class="tooltiptext">
            -Gives you $1 each day<br>
            -Adds +$10 rent money
        </span>
    </div>
    <div class="tooltip">
        Monkey<img src="../images/pets/monkey.png" style="width: 100%;">
        <span class="tooltiptext">
            -Gives you -5 to +5 extra rent days

        </span>
    </div>
    <div class="tooltip">
        Pig<img src="../images/pets/pig.png" style="width: 100%;">
        <span class="tooltiptext">
            -Will add 1 dollar every day to a piggy bank, which will be saved up until you are going to lose the game<br>
            -Has a Rare chance to accidentally breaking the piggy bank letting you have 25% to 75% of its profit

        </span>
    </div>
    <div class="tooltip" >
        Turtle<img src="../images/pets/turtle.png" style="width: 100%;">
        <span class="tooltiptext" id="right">
            -Lets you have 5-15 more days to pay for rent<br>
            -Increases rent price by 10% 


        </span>
    </div>
</div>

<div id='pet_grid'>
    <div class="tooltip">
        Bird<img src="../images/pets/bird.png" style="width: 100%;">
        <span class="tooltiptext" id="left">
            -Can uncommonly give you a cheque that has 0% - 25% of your rent price

        </span>
    </div>
    <div class="tooltip">
        Snake<img src="../images/pets/snake.png" style="width: 100%;">
        <span class="tooltiptext">
            -Gives you +1% rent price as profit each day<br>
            -Has a rare chance of being killed making you lose the buff
        </span>
    </div>
    <div class="tooltip">
        Rock<img src="../images/pets/rocks.png" style="width: 100%;">
        <span class="tooltiptext">
            -Has a uncommon chance to have an ability activated:<br>
	            • Adds +1 day until rent is due<br>
	            • Gives you +2% rent price as profit<br>
	            • Reduces rent price by 2.5% once<br>
	            • Reduces rent price by 1% permanently


        </span>
    </div>
    <div class="tooltip">
        Phoenix<img src="../images/pets/phoenix.png" style="width: 100%;">
        <span class="tooltiptext">
            -Pays for 100% of your rent and 25% of your next rent once you would lose<br>
            -The ability has one use<br>
            -Adds +10% rent payment until its ability is used

        </span>
    </div>
    <div class="tooltip">
        Dragon<img src="../images/pets/dragon.png" style="width: 100%;">
        <span class="tooltiptext">
            Has all pet buffs and de buffs
        </span>
    </div>
    <div class="tooltip">
        Egg<img src="../images/pets/eggs.png" style="width: 100%;">
        <span class="tooltiptext" id='right'>
            ???
        </span>
    </div>
</div>


</body>
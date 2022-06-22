<!DOCTYPE html>
<?php
require('../extras/important/require_me.php');
?>

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

<br><br>
<h1>Pets</h1>

<input type="button" onclick="location='game.php'" value="Back To Game">
<br>

<!--select pet-->
<form method="POST">
    <select name="pets" id="pets" class='pets' style="width:15%" required>
    <?php 
        $user_pet_data = mysqli_query($connection,"SELECT * FROM sg_pets WHERE UserKey = '$userkey';");
        $user_pet_info = mysqli_fetch_array( $user_pet_data );

    ?>
        <option value="">Select an option</option>
        <?php 
            $pet_list = array('dog', 'cat', 'goldfish','monkey','pig','turtle','bird','snake','rock','phoenix','dragon','egg');
            foreach($pet_list as $pet_var){    
                $user_pet_data = mysqli_query($connection,"SELECT * FROM sg_pets WHERE UserKey = '$userkey'");
                $user_pet_info = mysqli_fetch_array( $user_pet_data );
                if($user_pet_info["$pet_var"] == 1){
                    echo "<option value=\"$pet_var\">$pet_var</option>";
                }else{

                }
                
            }
        ?>
        <option value="none">None</option>

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
        Dog
        <?php 
            if($user_pet_info['dog'] == 1){
                echo '<img src="../images/pets/dog.png" style="width: 100%;">';
            }else{
                echo '<img src="../images/pets/unlock/dog.png" style="width: 100%;">';
            }
        ?>
        
        <span class="tooltiptext" id='left'>
        <?php 
            if($user_pet_info['dog'] == 1){
                echo '-Can Commonly give you $10 - $100<br>
                -Can Uncommonly permanently increase the rent price by $5 - $50<br>';
            }else{
                echo '???';
            }
        ?>
            <div id='common'>[Common]</div>
        </span>
    </div>
    <div class="tooltip">
        Cat
        <?php 
            if($user_pet_info['cat'] == 1){
                echo '<img src="../images/pets/cat.png" style="width: 100%;">';
            }else{
                echo '<img src="../images/pets/unlock/cat.png" style="width: 100%;">';
            }
        ?>
        <span class="tooltiptext">
        <?php 
            if($user_pet_info['cat'] == 1){
                echo '-50% of the time gives you a 5% discount to rent price<br>
                -But can uncommonly increase rent price permanently by 0-7.5% <br>';
            }else{
                echo '???';
            }
        ?>
            <div id='common'>[Common]</div>

        </span>
    </div>
    <div class="tooltip">
        Goldfish
        <?php 
            if($user_pet_info['goldfish'] == 1){
                echo '<img src="../images/pets/goldfish.png" style="width: 100%;">';
            }else{
                echo '<img src="../images/pets/unlock/goldfish.png" style="width: 100%;">';
            }
        ?>
        <span class="tooltiptext">
        <?php 
            if($user_pet_info['goldfish'] == 1){
                echo '-Gives you 1% of your rent as money each day<br>
                -Increases rent by 10%<br>';
            }else{
                echo '???';
            }
        ?>
            
            <div id="uncommon">[Uncommon]</div>

        </span>
    </div>
    <div class="tooltip">
        Monkey
        <?php 
            if($user_pet_info['monkey'] == 1){
                echo '<img src="../images/pets/monkey.png" style="width: 100%;">';
            }else{
                echo '<img src="../images/pets/unlock/monkey.png" style="width: 100%;">';
            }
        ?>
        <span class="tooltiptext">
        <?php 
            if($user_pet_info['monkey'] == 1){
                echo '-Gives you -5 to +5 extra rent days.<br>';
            }else{
                echo '???';
            }
        ?>
            <div id='uncommon'>[Uncommon]</div>


        </span>
    </div>
    <div class="tooltip">
        Pig
        <?php 
            if($user_pet_info['pig'] == 1){
                echo '<img src="../images/pets/pig.png" style="width: 100%;">';
            }else{
                echo '<img src="../images/pets/unlock/pig.png" style="width: 100%;">';
            }
        ?>
        <span class="tooltiptext">
        <?php 
            if($user_pet_info['pig'] == 1){
                echo '-Will save 1% of your money to a piggy bank everyday.<br>
                -if you are going to lose the pig will smash the piggy bank and use the money to hopefully save you.<br>';
            }else{
                echo '???';
            }
        ?>
            <div id='epic'>[Epic]</div>


        </span>
    </div>
    <div class="tooltip" >
        Turtle
        <?php 
            if($user_pet_info['turtle'] == 1){
                echo '<img src="../images/pets/turtle.png" style="width: 100%;">';
            }else{
                echo '<img src="../images/pets/unlock/turtle.png" style="width: 100%;">';
            }
        ?>
        <span class="tooltiptext" id="right">
        <?php 
            if($user_pet_info['turtle'] == 1){
                echo '-Lets you have 5-15 more days to pay for rent.<br>
                -Increases rent price by 10%.<br>';
            }else{
                echo '???';
            }
        ?>
            <div id='rare'>[Rare]</div>

        </span>
    </div>
</div>

<div id='pet_grid'>
    <div class="tooltip">
        Bird
        <?php 
            if($user_pet_info['bird'] == 1){
                echo '<img src="../images/pets/bird.png" style="width: 100%;">';
            }else{
                echo '<img src="../images/pets/unlock/bird.png" style="width: 100%;">';
            }
        ?>
        <span class="tooltiptext" id="left">
        <?php 
            if($user_pet_info['bird'] == 1){
                echo '-Can uncommonly give you a cheque that has 0% - 30% of your rent price<br>';
            }else{
                echo '???';
            }
        ?>
            <div id='rare'>[Rare]</div>

        </span>
    </div>
    <div class="tooltip">
        Snake
        <?php 
            if($user_pet_info['snake'] == 1){
                echo '<img src="../images/pets/snake.png" style="width: 100%;">';
            }else{
                echo '<img src="../images/pets/unlock/snake.png" style="width: 100%;">';
            }
        ?>
        <span class="tooltiptext">
        <?php 
            if($user_pet_info['snake'] == 1){
                echo '-Gives you +1% rent price as profit each day.<br>
                -Has a rare chance of being killed making you lose the buff.<br>';
            }else{
                echo '???';
            }
        ?>
            <div id='epic'>[Epic]</div>

        </span>
    </div>
    <div class="tooltip">
        Rock
        <?php 
            if($user_pet_info['rock'] == 1){
                echo '<img src="../images/pets/rock.png" style="width: 100%;">';
            }else{
                echo '<img src="../images/pets/unlock/rock.png" style="width: 100%;">';
            }
        ?>
        <span class="tooltiptext">
        <?php 
            if($user_pet_info['rock'] == 1){
                echo '-Has a uncommon chance to have an ability activated:<br>
	            • Adds +1 day until rent is due<br>
	            • Gives you +2% rent price as profit<br>
	            • Can give you 1-5 of any share<br>
	            • Reduces rent price by 1% permanently<br>';
            }else{
                echo '???';
            }
        ?>
            <div id='epic'>[Epic]</div>


        </span>
    </div>
    <div class="tooltip">
        Phoenix
        <?php 
            if($user_pet_info['phoenix'] == 1){
                echo '<img src="../images/pets/phoenix.png" style="width: 100%;">';
            }else{
                echo '<img src="../images/pets/unlock/phoenix.png" style="width: 100%;">';
            }
        ?>
        <span class="tooltiptext">
        <?php 
            if($user_pet_info['phoenix'] == 1){
                echo '-Pays for 100% of your rent and 25% of your next rent once you would lose<br>
                -The ability has one use<br>
                -Adds +10% rent payment until its ability is used<br>';
            }else{
                echo '???';
            }
        ?>
            <div id='legendary'>[Legendary]</div>


        </span>
    </div>
    <div class="tooltip">
        Dragon
        <?php 
            if($user_pet_info['dragon'] == 1){
                echo '<img src="../images/pets/dragon.png" style="width: 100%;">';
            }else{
                echo '<img src="../images/pets/unlock/dragon.png" style="width: 100%;">';
            }
        ?>
        <span class="tooltiptext">
        <?php 
            if($user_pet_info['dragon'] == 1){
                echo 'pet buffs / de buffs to go here';
            }else{
                echo '??? <br> Pet not finished';
            }
        ?>

            <div id='mythic'>[Mythic]</div>

        </span>
    </div>
    <div class="tooltip">
        Egg
        <?php 
            if($user_pet_info['egg'] == 1){
                echo '<img src="../images/pets/egg.png" style="width: 100%;">';
            }else{
                echo '<img src="../images/pets/unlock/egg.png" style="width: 100%;">';
            }
        ?>
        <span class="tooltiptext" id='right'>
        <?php 
            if($user_pet_info['egg'] == 1){
                echo 'pet buffs/de buffs to go here';
            }else{
                echo '??? <br> Pet not finished';
            }
        ?>
            <div id='unique'>[Unique]</div>

        </span>
    </div>
</div>


</body>
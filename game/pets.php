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
    <select name="pets" id="pets" class='pets' required>
    <?php 
        $user_pet_data = mysqli_query($connect,"SELECT * FROM sg_pets WHERE UserKey = '$userkey';");
        $user_pet_info = mysqli_fetch_array( $user_pet_data );

    ?>
        <option value="">Select an option</option>
        <?php 
            $pet_list = array('dog', 'cat', 'goldfish','monkey','pig','turtle','bird','snake','rock','phoenix','dragon','egg','bee','cow','eagle','panda','rabbit','snail','whale','butterfly','dinosaur','unicorn','owl','fox');
            foreach($pet_list as $pet_var){    
                $user_pet_data = mysqli_query($connect,"SELECT * FROM sg_pets WHERE UserKey = '$userkey'");
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

<!-- HERE 

echo_pet_info($user_pet_info, $pet, $rarity, $unlocked_msg, $locked_msg);

-->


<br><br>

<div id='pet_grid'>
    <div class="tooltip" >
        Dog
        <?php
            echo_pet_info($user_pet_info, 'dog', 'Common', '-Can Commonly give you $10 - $100<br> 
            -Can Uncommonly permanently increase the rent price by $5 - $50<br>', '???');

        ?>
    </div>

    <div class="tooltip">
        Cat
        <?php 
            echo_pet_info($user_pet_info, 'cat', 'Common', '-50% of the time gives you a 5% discount to rent price<br>
            -But can uncommonly increase rent price permanently by 0-7.5% <br>', '???');
        ?>
    </div>

    <div class="tooltip">
        Goldfish
        <?php 
            echo_pet_info($user_pet_info, 'goldfish', 'Uncommon', '-Gives you 1% of your rent as money each day<br>
            -Increases rent by 10%<br>', '???');
        ?>
    </div>

    <div class="tooltip">
        Monkey
        <?php 
            echo_pet_info($user_pet_info, 'monkey', 'Uncommon', '-Gives you -5 to +5 extra rent days.<br>' , '???');
        ?>
    </div>
    <div class="tooltip">
        Pig
        <?php 
            echo_pet_info($user_pet_info, 'pig', 'Epic', '-Will save 1% of your money to a piggy bank everyday.<br> -if you are going to lose the pig will smash the piggy bank and use the money to hopefully save you.<br>' , '???');

        ?>
    
        </span>
    </div>
    <div class="tooltip" >
        Turtle
        <?php 
            echo_pet_info($user_pet_info, 'turtle', 'Rare', '-Lets you have 5-15 more days to pay for rent.<br> -Increases rent price by 10%.<br>' , '???');

        ?>


        </span>
    </div>
</div>

<div id='pet_grid'>
    <div class="tooltip">
        Bird
        <?php 
            echo_pet_info($user_pet_info, 'bird', 'Rare', '-Can uncommonly give you a cheque that has 0% - 30% of your rent price<br>' , '???');
        ?>
    </div>

    <div class="tooltip">
        Snake
        <?php 
            echo_pet_info($user_pet_info, 'snake', 'Rare', '-Gives you +1% rent price as profit each day.<br>
            -Has a rare chance of being killed making you lose the buff.<br>' , '???');
        ?>
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
            echo_pet_info($user_pet_info, 'dragon', 'Mythic', 'How?' , 'Pet Not Finished,<br> Coming Soon!');
        ?>
    </div>
    <div class="tooltip">
        Egg
        <?php 
            echo_pet_info($user_pet_info, 'egg', 'Unique', 'How?' , 'Pet Not Finished,<br> Coming Soon!');
        ?>
    </div>
</div>
<div id='pet_grid'>
    <div class="tooltip">
        Bee
        <?php 
            echo_pet_info($user_pet_info, 'bee', 'Unique', 'How?' , 'Pet Not Finished,<br> Coming Soon!');
        ?>
    </div>
    <div class="tooltip">
        Cow
        <?php 
            echo_pet_info($user_pet_info, 'cow', 'Unique', 'How?' , 'Pet Not Finished,<br> Coming Soon!');
            
        ?>
    </div>
    
    <div class="tooltip">
        <?php 
        //echo 'Eagle';
            //echo_pet_info($user_pet_info, 'eagle', 'Unknown', 'How?' , 'Pet Not Finished');
        ?>
    </div>
    <div class="tooltip">
        <?php 
        //echo 'Panda';
            //echo_pet_info($user_pet_info, 'panda', 'Unknown', 'How?' , 'Pet Not Finished');
        ?>
    </div>
    <div class="tooltip">
        
        <?php 
        //echo 'Rabbit';
            //echo_pet_info($user_pet_info, 'rabbit', 'Unknown', 'How?' , 'Pet Not Finished');
        ?>     
    </div>

    <div class="tooltip">
        
        <?php 
        //echo 'Snail';
            //echo_pet_info($user_pet_info, 'snail', 'Unknown', 'How?' , 'Pet Not Finished');
            
        ?>
    </div>

</div>
<!--
<div id='pet_grid'>
    <div class="tooltip">
        Whale
        <?php /*
            echo_pet_info($user_pet_info, 'whale', 'Unknown', 'How?' , 'Pet Not Finished');
        ?>
    </div>
    <div class="tooltip">
        Butterfly
        <?php 
            echo_pet_info($user_pet_info, 'butterfly', 'Unknown', 'How?' , 'Pet Not Finished');
        ?>
    </div>
    <div class="tooltip">
        Dinosaur
        <?php 
            echo_pet_info($user_pet_info, 'dinosaur', 'Unknown', 'How?' , 'Pet Not Finished');
        ?>
    </div>
    <div class="tooltip">
        Unicorn
        <?php 
            echo_pet_info($user_pet_info, 'unicorn', 'Unknown', 'How?' , 'Pet Not Finished');
        ?>
    </div>
    <div class="tooltip">
        Owl
        <?php 
            echo_pet_info($user_pet_info, 'owl', 'Unknown', 'How?' , 'Pet Not Finished');
            
        ?> 
    </div>
    <div class="tooltip">
        Fox

        <?php 
            echo_pet_info($user_pet_info, 'fox', 'Unknown', 'How?' , 'Pet Not Finished');
            */
        ?>

    </div>
</div> 
-->



</body>
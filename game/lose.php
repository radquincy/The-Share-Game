<!DOCTYPE html>
<?php 
require('../extras/important/require_me.php');
?>

<body style="text-align: center">
    <!--Headings-->
    <div class="topheading"><img src="../images/logo2.png" style="width: 200px;"><br>YOU LOSE!</div>

    <?php
        @session_start();
        $day = $_SESSION['day'];
        $networth = $_SESSION['networth'];
        $networthL = $_SESSION['networthL'];
        if($day > 0 && $networth > 0){
            $last_rent = $_SESSION['rentprice'] / 3;
            $score = $networth / $day + $last_rent;
            $score = round($score);
        }else{
            $score = 0;
        }

        
        //?statistics save to database
        if($_SESSION['lose'] == true){
            $data589 = mysqli_query($connect,"SELECT * FROM sg_stats WHERE UserKey = '$userkey';");
                @$info589 = mysqli_fetch_array( $data589 );

            if ($info589['UserKey'] == $userkey){
                if ($info589['high_score'] > $score){
                    $HighScore = $info589['high_score'];
                }else{
                    $HighScore = $score;
                }
                    if ($info589['highest_day'] > $day){
                    $HighestDay = $info589['highest_day'];
                }else{
                    $HighestDay = $day;
                }
        
                if ($info589['highest_networth'] > $networth){
                    $HighestNetWorth = $info589['highest_networth'];
                }else{
                    $HighestNetWorth = $networth;
                }
                $GamesPlayed = $info589['games_played'] + 1;

                mysqli_query ($connect,"UPDATE sg_stats SET high_score = '$HighScore', highest_day = '$HighestDay', highest_networth = '$HighestNetWorth', games_played = '$GamesPlayed' WHERE UserKey = '$userkey'");
            }else{
                mysqli_query ($connect,"INSERT INTO sg_stats (UserKey, high_score, highest_day, highest_networth, games_played) VALUES('$userkey','$score','$day','$networth','1')");
            }
        }




        //pet unlock
        $user_pet_data = mysqli_query($connect,"SELECT * FROM sg_pets WHERE UserKey = '$userkey';");
        $user_pet_info = mysqli_fetch_array( $user_pet_data );
        if($user_pet_info['dog'] == 0){
            mysqli_query ($connect,"UPDATE sg_pets SET dog = 1 WHERE UserKey = '$userkey'");
            echo "<div class=\"note_good\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                You Unlocked the Dog pet!
            </div>";
        }
        if($user_pet_info['cat'] == 0){
            mysqli_query ($connect,"UPDATE sg_pets SET cat = 1 WHERE UserKey = '$userkey'");
            echo "<div class=\"note_good\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                You Unlocked the Cat pet!
            </div>";
        }
        if($GamesPlayed >= 1000){
            if($user_pet_info['phoenix'] == 0){
                mysqli_query ($connect,"UPDATE sg_pets SET phoenix = 1 WHERE UserKey = '$userkey'");
                echo "<div class=\"note_good\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                    You Unlocked the Phoenix pet!
                </div>";
            }
        }
        if($GamesPlayed >= 100){
            if($user_pet_info['snake'] == 0){
                mysqli_query ($connect,"UPDATE sg_pets SET snake = 1 WHERE UserKey = '$userkey'");
                echo "<div class=\"note_good\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                    You Unlocked the Snake pet!
                </div>";
            }
        }
    ?>
    
    <p><?php echo $username ?>, you were kicked out of your apartment because you were not able to pay your rent!<br>

    <?php

    $sale1price = rand(10,60);
    $sale2price = rand(10,60);

 
    mysqli_query ($connect,"UPDATE savegame SET day = '0', rentduein = '30', rentprice = '100', money = '500', share1price = '$sale1price', share1owned = '0',share1pricelast = '0', share2price = '$sale2price', share2owned = '0', share2pricelast = '0' WHERE UserKey = '$userkey'");
    
    
    
    echo " but you survived $day days! with a networth of $".$networthL."<br>";
    echo "score: $score<p>";



    
//delete all save stuff
    //lose true/false
    @$_SESSION['lose'] = false;
    //has the game been saved by session?
    @$_SESSION['session'] = null;
    //money
    @$_SESSION['money'] = null;
    //sale1
    @$_SESSION['sale1price'] = null;
    @$_SESSION['sale1'] = null;
    //sale2
    @$_SESSION['sale2price'] = null;
    @$_SESSION['sale2'] = null;
    //rent
    @$_SESSION['rentprice'] = null;
    @$_SESSION['rentday'] = null;
    //last price +/-
    @$_SESSION['sale1pricelast'] = null;
    @$_SESSION['sale2pricelast'] = null;
    //last pet
    @$_SESSION['pets'] = '';
    //piggy piggy_bank
    $_SESSION['piggy_bank'] = null;
    ?>

    
    <form type="post">
    <input type="button" onclick="location='game_mode.php'" value="Play Again?">
    <input type="button" onclick="location='home.php'" value="Home Page">
    <input type="button" onclick="location='../versions_page.php'" value="View Game Versions">
    </form>


</body>
</html>
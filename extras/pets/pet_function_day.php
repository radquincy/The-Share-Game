<?php


@$pet = $_SESSION['pets'];

switch($pet){
    case 'dog':
        //randomly give you $10 - 100
        $chance_dog_1 = rand(1,50);
        if($chance_dog_1 == 1){
            $rand_dog_1 = rand(10, 100);
            $money = $money + $rand_dog_1;
            echo "<div class=\"note_good\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                your dog found $".$rand_dog_1." that you get to keep
            </div>";
        }else{
            //randomly increase rent price by $2 - 25
            $chance_dog_2 = rand(1,100);
            if($chance_dog_2 == 1){
                $rand_dog_2 = rand(5, 25);
                $rentprice = $rentprice + $rand_dog_2;
                echo "<div class=\"note_warn\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Your rent was increased by $".$rand_dog_2." because your dog broke something!
                </div>";
            }
        }
    break;
    case 'cat':
        //increase rent price permanently by $0 - 7.5% of rent
        $chance_cat_1 = rand(1,50);
        if($chance_cat_1 == 1){
            $var_cat_1 = $rentprice / 200 * 15;
            $rand_cat_1 = rand(0,$var_cat_1);
            $rentprice = $rentprice + $rand_cat_1;
            echo "<div class=\"note_warn\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Your rent was increased by $".$rand_cat_1." because your cat broke something!
                </div>";
            
        }
        //discount rent price by 5%
        
    break;
    case 'goldfish':

        //+ $1 each day
        $money = $money + 1;

        //add $10 to rent price

        
    break;
    case 'monkey':
        // rand -5 to +5 rent day
        //? above is the only ability 
        
    break;
    case 'pig':
        //adds $1 every day to the piggy bank and uses it when you are going to lose
        if ($money >= 1){
            $money = $money - 1;
            $piggy_bank = $piggy_bank + 1;
        }

        //has a 1/1000 chance to break and you gain 25% - 75% of the money (the rest goes into the new piggy bank)
        
    break;
    case 'turtle':
        //!pet needs to be completed

    break;
    case 'bird':
        //randomly give you a cheque
        $chance_bird_1 = rand(1,100);
        if ($chance_bird_1 == 1){
            $calc_bird_1 = $rentprice / 4;
            $rand_bird_1 = rand(0, $calc_bird_1);
            $money = $money + $rand_bird_1;
            echo "<div class=\"note_good\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Your Bird Found you a cheque worth $".$rand_bird_1." and you get to keep it
            </div>";
        }


    break;
    case 'snake':
        if($snake == true){
            $money = $money + ($rentprice / 100);
            $snake_death = rand(1,1000);
            if ($snake_death = 1){
                $snake = false;
                echo "your snake was killed, you no longer get the snakes buff";
            }
        }
        
    break;
    case 'rock':
        //rand buff
       $chance_rock_1 = rand(1,30);
       if($chance_rock_1 == 1){
           $rand_rock_1 = rand(1,4);
           switch($rand_rock_1){
                case 1:
                    $rand_rock_4 = rand(1,5);
                    $rentday = $rentday + $rand_rock_4;
                    echo "<div class=\"note_good\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                    you got ".$rand_rock_4." extra day/s until your rent is due, because of you rock
                    </div>";
                break;
                case 2:
                    $money = $money + (($rentprice / 100) * 2);
                    echo "<div class=\"note_good\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                    your rock got you 2% of your rent price
                    </div>";

                break;
                case 3:
                    $rand_rock_2 = rand(1,2);
                    $rand_rock_3 = rand(1,5);
                    if($rand_rock_2 == 1){
                        $sale1 = $sale1 + $rand_rock_3;
                    }elseif($rand_rock_2 == 2){
                        $sale2 = $sale2 + $rand_rock_3;
                    }
                    echo "<div class=\"note_good\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                    your rock gave you ".$rand_rock_3." of share ".$rand_rock_2."
                    </div>";

                break;
                case 4:
                    $rand_rock_5 = rand(1,5);
                    $rentprice = $rentprice - (($rentprice / 100)* $rand_rock_5);
                    echo "<div class=\"note_good\">
                    <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                    your rock reduced your rent by ".$rand_rock_5."%
                    </div>";
                break;

           }
       }
    break;
    case 'phoenix':
        if ($phoenix == true){
            //add rent payment until death
            
            if ($day == 0 && $money < $rentprice){
                $money = $money + ($rentprice + ($rentprice/4*3));
                $phoenix = false;
            }
        }

        
        
    break;
    case 'dragon':
        //no way im doing dragon yet
    break;
    case 'egg':
        
    break;
    case '':
    break;
    default:
    
   
}

?>
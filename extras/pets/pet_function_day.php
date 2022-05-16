<?php


//! Note: add this to the next day function to run along with that function
//? for above is there any way i can connect the functions to the next day function?

$pet = $_SESSION['pets'];

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
        //randomly give you a check
        $chance_bird_1 = rand(1,100);
        if ($chance_bird_1 == 1){
            $calc_bird_1 = $rentprice / 4;
            $money = $money + rand(0, $calc_bird_1);
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
       $chance_rock_1 = rand(1,100);
       if($chance_rock_1 == 1){
           $rand_rock_1 = rand(1,4);
           switch($rand_rock_1){
                case 1:
                    $rentday = $rentday + 1;
                    echo "you got one extra day until your rent is due because of you rock";
                break;
                case 2:
                    $money = $money + ($rentprice / 50);
                    echo 'your rock got you 2% of your rent  price';

                break;
                case 3:
                    $rand_rock_2 = rand(1,2);
                    $rand_rock_3 = rand(1,5);
                    if($rand_rock_2 == 1){
                        $sale1 = $sale1 + $rand_rock_3;
                    }elseif($rand_rock_2 == 2){
                        $sale2 = $sale2 + $rand_rock_3;
                    }
                    echo 'your rock gave you '.$rand_rock_3.' of share'.$rand_rock_2;

                break;
                case 4:
                    $rentprice = $rentprice - ($rentprice / 100);
                    echo 'your rock reduced your rent by 1%';
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
        echo "no pet selected case";
    break;
    default:
    echo "no pet selected default";
    
   
}

?>
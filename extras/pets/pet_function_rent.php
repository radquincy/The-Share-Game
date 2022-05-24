<?php

//!NOTES:
// $_SESSION['pet_usage'] = [0]=phoenix [1]=snake

@$pet = $_SESSION['pets'];

switch($pet){
    case 'dog':
        
    break;
    case 'cat':
        //discount rent price by 5%
        $rent_price_discount = $rentprice / 100 * 5;
        echo "<div class=\"note_good\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Your rent price was decreased by 5% because of your cat!
            </div>";

        
    break;
    case 'goldfish':
        //add $10 to rent price
        $rent_price_increase = 10;
        
    break;
    case 'monkey':
        // rand -5 to +5 rent day
        //? above is the only ability 
        $rent_day_change = rand(-5,5);
        if ($rent_day_change == 0){
            echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Your monkey didn\'t increase or decrease your rent days
            </div>";

        }elseif ($rent_day_change < 0){
            echo "<div class=\"note_warn\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Your Monkey decreased you rent days by ".$rent_day_change." days
            </div>";

        }elseif($rent_day_change > 0){
            echo "<div class=\"note_goodd\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Your Monkey increased you rent days by ".$rent_day_change." days
            </div>";

        }
        
    break;
    case 'pig':

    break;
    case 'turtle':
        //!pet needs to be completed
        //Lets you have 5-15 more days to pay for rent (re-rolled each rent day)
        $rent_day_change = rand(5,15);
        //Increases rent price by 10% 
        $rent_price_increase = ($rentprice / 100) * 10;
        echo "<div class=\"note_goodd\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Your turtle gave you ". $rent_day_change ." extra days before you need to pay for your rent
            </div>";

    break;
    case 'bird':
        //? none

    break;
    case 'snake':
            
    break;
    case 'rock':
        
    break;
    case 'phoenix':

    break;
    case 'dragon':
        //no way im doing dragon yet
    break;
    case 'egg':
        //egg to come soon
    break;
    case '':
        
    break;
    default:
    
   
}

?>
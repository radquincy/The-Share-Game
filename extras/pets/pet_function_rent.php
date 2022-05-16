<?php


//! Note: add this to the next day function to run along with that function
//? for above is there any way i can connect the functions to the next day function?

$pet = $_SESSION['pets'];

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

        
    break;
    case 'monkey':
        // rand -5 to +5 rent day
        //? above is the only ability 
        
    break;
    case 'pig':

    break;
    case 'turtle':
        //!pet needs to be completed
        //Lets you have 5-15 more days to pay for rent (re-rolled each rent day)
        //Increases rent price by 10% 

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
        echo "no pet selected case";
    break;
    default:
    echo "no pet selected default";
    
   
}

?>
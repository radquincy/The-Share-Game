<?php
/*@session_start();
$pet = 'dog';*/
/*
$_SESSION['pet_end-of-rent'] //*array
$_SESSION['pet_start-of-rent']//*array 
$_SESSION['pet_random']//*array [0] = ability  type, [1] = chance (1/{your num}), [2] = min, [3] = max, ect.
        *R = random
        *money
        *r = rent
            *d = due
            *p = price
                *t = rent turn
                *else its permanent price increase
        *% = percentage
        *d = day change

        !The variable system might be a bit hard to code ^^^above^^^

        ?resorting to a singular code for each function
    *m = money
        #m001 = gain a random amount of money
        #m002 = 

    *m% = money percent
        #
        #

    *d = day
        #
        #

    *r = rent
        #
        #

    *r% = rent percentage
        #
        #

    *rp = rent price
        #rp001 = rent price increase / decrease
        #

    *rp% = rent price percent
        #
        #



*/

    switch($pet){
        case $pet == 'dog':
            $_SESSION['pet_type'] = 'dog';
            $_SESSION['pet_stats'] = array(array('#m001','50','10','100'),array('#rp001','100','5','25'));
            
        break;
        case $pet == 'cat':
            $_SESSION['pet_stats'] = array();
        break;
        case $pet == 'goldfish':
            
        break;
        case $pet == 'monkey':
            
        break;
        case $pet == 'pig':
            
        break;
        case $pet == 'turtle':
            
        break;
        case $pet == 'bird':
            
        break;
        case $pet == 'snake':
            
        break;
        case $pet == 'rock':
           
        break;
        case $pet == 'phoenix':
            
        break;
        case $pet == 'dragon':
            
        break;
        case $pet == 'rock':
            
        break;

        default:
        echo "no pet selected";
    }
    $array_value = $_SESSION['pet_random'];
    
    echo print_r($array_value);
    echo '<br>'.$array_value[0];
?>

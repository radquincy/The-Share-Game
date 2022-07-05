<?php
    if ($rentday < 1)   {
        if ($money >= $rentprice)   {
                        
            $money -= $rentprice;
            $rentprice *= 3;

            require("../extras/pets/pet_function_rent.php");

            if (empty($rent_price_discount)){
                $rent_price_discount = 0;
            }
            if (empty($rent_price_increase)){
                $rent_price_increase = 0;
            }
            if (empty($rent_day_change)){
                $rent_day_change = 0;
            }

            //pet discounts for rent price
            $rentprice += @$rent_price_increase;
            $rentprice -= @$rent_price_discount;

            $rentday = 30;
            $rentday += @$rent_day_change;

            notification('warn','Money for rent was taken!');

        }else{
            header("Location:lose.php");
            
        }
    }
?>
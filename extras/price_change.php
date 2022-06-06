<?php
require('../extras/important/require_me.php');

if($rentday > 0){
if ($sale1pricelast == 0){
        $sale1pricelast = rand(-6,10);
        $sale1price = $sale1price + $sale1pricelast;

}elseif ($sale1pricelast < 0){
    //chance for price CRASH
    if($sale1price >= 500){
    $EVENT_ShareOneLessThen = rand(1,100);
    //if stuff
    if($EVENT_ShareOneLessThen <= 30){
        $sale1pricelast = rand(-50,-70);
        $sale1price = $sale1price + $sale1pricelast;
    }elseif($EVENT_ShareOneLessThen >  20){
        $sale1pricelast = rand(-12,5);
        $sale1price = $sale1price + $sale1pricelast;
    }
    }
    elseif($sale1price <= 500 && $sale1price > 100 ){
        $EVENT_ShareOneLessThen = rand(1,100);
        //if stuff
        if($EVENT_ShareOneLessThen <= 20){
            $sale1pricelast = rand(-20,-40);
            $sale1price = $sale1price + $sale1pricelast;
        }elseif($EVENT_ShareOneLessThen >  10){
            $sale1pricelast = rand(-12,5);
            $sale1price = $sale1price + $sale1pricelast;
        }
    }
    elseif($sale1price <= 100){
        $EVENT_ShareOneLessThen = rand(1,100);
        //if stuff
        if($EVENT_ShareOneLessThen <= 10){
            $sale1pricelast = rand(-20,-40);
            $sale1price = $sale1price + $sale1pricelast;
        }elseif($EVENT_ShareOneLessThen >  5){
            $sale1pricelast = rand(-12,5);
            $sale1price = $sale1price + $sale1pricelast;
        }
    }
    

}elseif ($sale1pricelast > 0){
    //chance for price JUMP
    //under 100$$
    if($sale1price <= 100){
       $EVENT_ShareOneMoreThen = rand(1,100);
            //if stuff
        if($EVENT_ShareOneMoreThen <= 30){
            $sale1pricelast = rand(25, 40);
            $sale1price = $sale1price + $sale1pricelast;
            $sale1pricelast = 0;
        }elseif($EVENT_ShareOneMoreThen > 20){
            $sale1pricelast = rand(-2,10);
            $sale1price = $sale1price + $sale1pricelast;   
        } 
    }
        //over 100$$
    elseif($sale1price > 100){
        $EVENT_ShareOneMoreThen = rand(1,100);
        //if stuff
        if($EVENT_ShareOneMoreThen <= 20){
            $sale1pricelast = rand(20, 40);
            $sale1price = $sale1price + $sale1pricelast;
            $sale1pricelast = 0;
        }elseif($EVENT_ShareOneMoreThen > 10){
            $sale1pricelast = rand(-2,10);
            $sale1price = $sale1price + $sale1pricelast;   
        } 
    }           
}

//============================================================================

if ($sale2pricelast == 0){
    $sale2pricelast = rand(-6,10);
    $sale2price = $sale2price + $sale2pricelast;

}elseif ($sale2pricelast < 0){
    //chance for price CRASH
    if($sale2price >= 500){
        $EVENT_ShareTwoLessThen = rand(1,100);
        //if stuff
        if($EVENT_ShareTwoLessThen <= 30){
            $sale2pricelast = rand(-50,-70);
            $sale2price = $sale2price + $sale2pricelast;
        }elseif($EVENT_ShareTwoLessThen >  20){
            $sale1pricelast = rand(-12,5);
            $sale2price = $sale2price + $sale2pricelast;
        }           
    }
    elseif($sale2price <= 500 && $sale2price > 100){
        $EVENT_ShareTwoLessThen = rand(1,100);
        //if stuff
        if($EVENT_ShareTwoLessThen <= 20){
            $sale2pricelast = rand(-20,-40);
            $sale2price = $sale2price + $sale2pricelast;
        }elseif($EVENT_ShareTwoLessThen >  10){
            $sale2pricelast = rand(-12,5);
            $sale2price = $sale2price + $sale2pricelast;
        }
    }
    elseif($sale2price <= 100){
        $EVENT_ShareTwoLessThen = rand(1,100);
        //if stuff
        if($EVENT_ShareTwoLessThen <= 10){
            $sale2pricelast = rand(-20,-40);
            $sale2price = $sale2price + $sale2pricelast;
        }elseif($EVENT_ShareTwoLessThen >  5){
            $sale2pricelast = rand(-12,5);
            $sale2price = $sale2price + $sale2pricelast;
        }
    }


}elseif ($sale2pricelast > 0){
    //chance for price JUMP
    //under 100$$
    if($sale2price <= 100){
       $EVENT_ShareTwoMoreThen = rand(1,100);
        //if stuff
        if($EVENT_ShareTwoMoreThen <= 30){
            $sale2pricelast = rand(25, 40);
            $sale2price = $sale2price + $sale2pricelast;
            $sale2pricelast = 0;
        }elseif($EVENT_ShareTwoMoreThen > 20){
            $sale2pricelast = rand(-2,10);
            $sale2price = $sale2price + $sale2pricelast;   
        } 
    }
    //over 100$$
    elseif($sale2price > 100){
        $EVENT_ShareTwoMoreThen = rand(1,100);
            //if stuff
        if($EVENT_ShareTwoMoreThen <= 20){
            $sale2pricelast = rand(20, 40);
            $sale2price = $sale2price + $sale2pricelast;
            $sale2pricelast = 0;
        }elseif($EVENT_ShareTwoMoreThen > 10){
                $sale2pricelast = rand(-2,10);
                $sale2price = $sale2price + $sale2pricelast;   
        } 
    }           
}
}else{
}


    ?>
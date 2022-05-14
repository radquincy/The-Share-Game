<?php 

if ($rentday > 0){
    //buy sale 1
if (isset($_POST["buysale1"])){
        if ($money >= $sale1price){
            $money = $money - $sale1price;
            $sale1++;
        }else{
            echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Not enough money to buy share 1
            </div>";
        }
    }
//sell sale 1
    if (isset($_POST["sellsale1"])){
        if ($sale1 >= 1){
            $money = $money + $sale1price;
            $sale1--;
        }else{
            echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                You do not have any more of share 1
            </div>";
        }
    }
//buy sale 1(50%)
if (isset($_POST["buysale1%50"])){
    if ($money >= ($sale1price*2)){
        $sale1y1 = $money / 2;
        $sale1y1 = $sale1y1 / $sale1price;
        $sale1y1 = floor($sale1y1);
        $money = $money - ($sale1y1 * $sale1price);
        $sale1 = $sale1 + $sale1y1;
    }else{
        echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Cannot buy share 1 with 50% of your money
            </div>";
    }
}
//sell sale 1(50%)
if (isset($_POST["sellsale1%50"])){
    if ($sale1 >= 2){
        $sale1y2 = $sale1 / 2;
        $sale1y2 = floor($sale1y2);
        $money = $money + ($sale1y2 * $sale1price);
        $sale1 = $sale1 - $sale1y2;
    }else{
        echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Cannot sell 50% of share 1
            </div>";
    }
}
//buy sale 1(MAX)
if (isset($_POST["buysale1MAX"])){
    if ($money >= ($sale1price)){
        $calc1sale1 = $money / $sale1price;
        $calc1sale1 = floor($calc1sale1); 
        $sale1 = $sale1 + $calc1sale1;
        $calc2sale1 = $calc1sale1 * $sale1price;
        $money = $money - $calc2sale1; 
    }else{
        echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Not enough money to buy share 1
            </div>";
    }
}
//sell sale 1(MAX)
if (isset($_POST["sellsale1MAX"])){
    if ($sale1 >= 1){
        $money = $money + ($sale1price*$sale1);
        $sale1 = $sale1 - $sale1;    
    }else{
        echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                You do not have any more of share 1
            </div>";
    }
}
//sell sale 1 (rent price)
if (isset($_POST["sellsale1rent"])){
    if ($sale1 >= 1){
        if($money >= $rentprice){
            echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                You already have the money for your rent
            </div>";
        }  elseif($money < $rentprice){
            $sale1x = $rentprice - $money;
            $sale1x = ceil($sale1x / $sale1price);
            if ($sale1 < $sale1x){
                echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                You do not have any enough of share 1
            </div>";
            }else if($sale1 >= $sale1x){
                $sale1 = $sale1 - $sale1x;
                $money = $money + ($sale1x * $sale1price);
            }
        }
    }else{
        echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                You do not have any more of share 1
            </div>";
    }
}

//sell sale2
if (isset($_POST["buysale2"])){
    if ($money >= $sale2price){
        $money = $money - $sale2price;
        $sale2++;
       
    }else{
        echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Not enough money to buy share 2
            </div>";
    }
}
//sell sale 2
if (isset($_POST["sellsale2"])){
    if ($sale2 >= 1){
        $money = $money + $sale2price;
        $sale2--;    
    }else{
        echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                You do not have any more of share 2
            </div>";
    }
}
//buy sale 2(50%)
if (isset($_POST["buysale2%50"])){
if ($money >= ($sale2price*2)){
    $sale2y1 = $money / 2;
    $sale2y1 = $sale2y1 / $sale2price;
    $sale2y1 = floor($sale2y1);
    $money = $money - ($sale2y1 * $sale2price);
    $sale2 = $sale2 + $sale2y1;
}else{
    echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Cannot buy share 2 with 50% of your money
            </div>";
}
}
//sell sale 2(50%)
if (isset($_POST["sellsale2%50"])){
if ($sale2 >= 2){
    $sale2y2 = $sale2 / 2;
    $sale2y2 = floor($sale2y2);
    $money = $money + ($sale2y2 * $sale2price);
    $sale2 = $sale2 - $sale2y2;
}else{
    echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Cannot sell 50% of share 2
            </div>";
}
}
//buy sale 2(MAX)
if (isset($_POST["buysale2MAX"])){
if ($money >= $sale2price){
    $calc1sale2 = $money / $sale2price;
    $calc1sale2 = floor($calc1sale2); 
    $sale2 = $sale2 + $calc1sale2;
    $calc2sale2 = $calc1sale2 * $sale2price;
    $money = $money - $calc2sale2;
}else{
    echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Not enough money to buy share 2
            </div>";
}}


//sell sale 2(MAX)
if (isset($_POST["sellsale2MAX"])){
if ($sale2 >= 1){
    $money = $money + ($sale2price*$sale2);
    $sale2 = $sale2 - $sale2;    
}else{
    echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                You do not have any more of share 2
            </div>";
}
}
//sell sale 2(rent price)
if (isset($_POST["sellsale2rent"])){
if ($sale2 >= 1){
    if($money >= $rentprice){
        echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                You already have the money for your rent
            </div>";
    }  elseif($money < $rentprice){
        $sale2x = $rentprice - $money;
        $sale2x = ceil($sale2x / $sale2price);
        if ($sale2 < $sale2x){
            echo "<div class=\"note_medium\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                You do not have any enough of share 2
            </div>";
        }else if($sale2 >= $sale2x){
            $sale2 = $sale2 - $sale2x;
            $money = $money + ($sale2x * $sale2price);
        }
    }
}else{
    echo "<div class=\"note_medium\">
            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
            You do not have any more of share 2
        </div>";
}
}

}else{
}

?>
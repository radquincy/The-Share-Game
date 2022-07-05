<?php
require('important/require_me.php');

$sale1pricelast = 0;
$sale2pricelast = 0;
$sale1price = rand(10,60);
$sale2price = rand(10,60);
require('important/connect.php');
$rentday = 1;
for($day = 0; $day <= 2000; $day++ ){
    
    require("price_change.php");
    echo ' '.$day.' ';
    //send to database
    mysqli_query($connect,"INSERT INTO datatest (day,Share1Price,Share2Price) VALUES('$day','$sale1price','$sale2price')");


}


?>
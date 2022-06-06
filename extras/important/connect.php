<?php
require('require_me.php');

//conect to the database
$host = "localhost";
$dbname = "sharesgame";
$usernameDB = "root";
$passwordDB = "";
@$connection = mysqli_connect($host, $usernameDB, $passwordDB) or die("ERROR: Unable to connect to database");
@mysqli_select_db($connection,$dbname) or die("ERROR: Unable to connect to database");


?>
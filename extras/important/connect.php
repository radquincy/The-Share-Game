<?php
require('require_me.php');

//conect to the database
$host = "localhost";
$dbname = "sharesgame";
$usernameDB = "root";
$passwordDB = "";
@$connect = mysqli_connect($host, $usernameDB, $passwordDB) or die("ERROR: Unable to connect to database");
@mysqli_select_db($connect, $dbname) or die("ERROR: Unable to connect to database 2");

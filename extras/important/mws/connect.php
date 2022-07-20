<?php
require('require_me.php');

//conect to the database
$host = "localhost";
$dbname = "oneild01db";
$usernameDB = "oneild01db";
$passwordDB = "oneild01pass";
@$connect = mysqli_connect($host, $usernameDB, $passwordDB) or die("ERROR: Unable to connect to database");
@mysqli_select_db($connect,$dbname) or die("ERROR: Unable to connect to database");


?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="stylesheet.css">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>


<?php
require 'connect.php';

// select all data records from the table
$data3 = mysqli_query($connection,"SELECT * FROM savegame");

// create the HTML table and column headings
echo "<div class='topheading'>Address Book</h2></div>";
echo "<table border cellpadding=3>";
echo "<tr>";
echo "<th width=100>PC Name</th><th width=100>Day</th>";
echo "</tr>";
echo "<tr><td colspan=5 align=right></td></tr>";

// loop through the array to display all data records
while($info2 = mysqli_fetch_array( $data3 ))
	{
	echo "<tr>";
	echo "<td>".$info2['pcname'] . "</td> ";
	echo "<td>".$info2['day'] . "</td> ";
	echo "</tr>";
	}
	echo "</table>";  // close the HTML table


?>


</body>
</html>
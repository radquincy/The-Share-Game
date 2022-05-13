<!DOCTYPE html>
<link rel="stylesheet" href="../css/stylesheet.css">
<?php require('../extras/important/needed.php');
require ('../extras/important/connect.php');

//delete all save stuff
    //has the game been saved by session?
    @$_SESSION['session'] = null;
    //net worth 
    @$_SESSION['networth'] = null;
    @$_SESSION['networthL'] = null;
    //money
    @$_SESSION['money'] = null;
    //sale1
    @$_SESSION['sale1price'] = null;
    @$_SESSION['sale1'] = null;
    //sale2
    @$_SESSION['sale2price'] = null;
    @$_SESSION['sale2'] = null;
    //day
    @$_SESSION['day'] = null;
    //rent
    @$_SESSION['rentprice'] = null;
    @$_SESSION['rentday'] = null;
    //last price +/-
    @$_SESSION['sale1pricelast'] = null;
    @$_SESSION['sale2pricelast'] = null;

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shares Game - Home</title>
</head>
<body>
    <!--Headings-->
    <div class="topheading">
        <img src="../images/logo2.png" style="width: 200px;">
        <p>Public Leader Board</p>
    </div>

    <input type="button" onclick="location='home.php'" value="Home Page">
    <br><br><br>

<table width='100%'>
    <tr>
        <th>User Name</th>
        <th>Highest Score</th>
        <th>Highest Net Worth</th>
        <th>Highest Day</th>
        <th>Games Played</th>
    </tr>
<?php

    $data = mysqli_query($connection,"SELECT * FROM sg_stats ORDER BY high_score DESC;");
    



foreach($data as $value){ 
    $UserKeySearch = $value['UserKey'];
    $data2 = mysqli_query($connection,"SELECT * FROM sgsignin WHERE userkey = '$UserKeySearch';");
    $info2 = mysqli_fetch_array( $data2 );
    echo '<tr>';
    echo '<td>'.$info2["username"].'</td><td>'.$value["high_score"].'</td><td>'.$value["highest_networth"].'</td><td>'.$value["highest_day"].'</td><td>'.$value["games_played"].'</td>';
    echo '</tr>';
}

?>

</table>

<br><br>
<input type="button" onclick="location='home.php'" value="Home Page">
<br><br>
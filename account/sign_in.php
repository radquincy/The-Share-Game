<?php  
@session_destroy(); 
require("../extras/important/require_me.php");
?>

<!DOCTYPE html>
<link rel="stylesheet" href="../css/stylesheet.css">
<html lang="en">
<body>
    <!--Headings-->
    <div class="topheading"><img src="../images/logo2.png" style="width: 200px;"></div>
</body>



<?php
@session_start();

if(!isset($_POST['username'])){
    $_SESSION['signin'] = 'false';
}

//sanitize the variables 
@$username = htmlspecialchars($_POST['username']);
@$password = htmlspecialchars($_POST['password']);

if(empty($username)){
    $_SESSION['signin'] = 'false';
}else{
    $info = sgsignin_username($username,$connect);

    if(strtolower($info['username'])==strtolower($username)){
        if(password_verify($password, $info['password'])) {
            $_SESSION['username'] = $info['username'];
            $_SESSION['key'] = $info['userkey'];
            $_SESSION['signin'] = 'true';
            header( "refresh:0; url=../game/home.php");
        }else{
            $_SESSION['signin'] = 'false';}
            notification('warn','Incorrect Username or Password!');
    }else{
        $_SESSION['signin'] = 'false';
        sleep(1);
        notification('warn','Incorrect Username or Password!');

    }
}

?>

<br>
<h2>Sign In</h2>

<form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <br><br>
    <input type="submit" name="submit">
</form>


<br><br><br>


<h5>Only Passwords are case sensitive for sign in!</h5>
<h5>If you do not have an account please <input type='button' onclick='location="create_account.php"' value='Create an Account'></h5>
<input type="button" onclick="location='../index.php'" value="Home">
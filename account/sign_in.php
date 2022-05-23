<?php  
@session_destroy(); 
require("../extras/important/connect.php");
?>

<!DOCTYPE html>
<link rel="stylesheet" href="../css/stylesheet.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shares Game - Sign In</title>
</head>
<body>
    <!--Headings-->
    <div class="topheading"><img src="../images/logo2.png" style="width: 200px;"></div>
</body>



<?php
session_start();
//open the storage container


//dont let people into your vault
if(!isset($_POST['username'])){
    $_SESSION['signin'] = 'false';
}

//sanitize the variables 
@$username = htmlspecialchars($_POST['username']);
@$password = htmlspecialchars($_POST['password']);
/*echo $username . ' ' . $password;*/


//sorry whats your name again...
if(empty($username)){
    $_SESSION['signin'] = 'false';
}else{
    //open boxes in your storage container
    @$usernamedata = mysqli_query($connection,"SELECT * FROM sgsignin WHERE username = '$username';");
    //read the documents in the boxes
    @$info = mysqli_fetch_array($usernamedata);

    //slightly change the documents
    if(strtolower($info['username'])==strtolower($username)){
        //verify the words in the documents
        if(password_verify($password, $info['password'])) {
            $_SESSION['username'] = $info['username'];
            $_SESSION['key'] = $info['userkey'];
            $_SESSION['signin'] = 'true';
            header( "refresh:0; url=../game/home.php");
        }else{
            echo "<div class=\"note_warn\">
            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
            Incorrect Username or Password!
            </div>"; 

            $_SESSION['signin'] = 'false';}
}else{
    sleep(2);
        echo "<div class=\"note_warn\">
            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
            Incorrect Username or Password!
            </div>"; 
    $_SESSION['signin'] = 'false';
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
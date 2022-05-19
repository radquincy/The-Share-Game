<!DOCTYPE html>
<?php
    require_once('../extras/important/connect.php');
    require_once('../extras/important/needed.php');
?>
<link rel="stylesheet" href="../css/stylesheet.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shares Game - Account</title>
</head>
<body style="text-align: center">
    <!--Headings-->
    <div class="topheading"><img src="../images/logo2.png" style="width: 200px;"></div>
</body>
<br>
<h2>Account Settings</h2>

<p>Change and view account details here!</p>
<br><br>
<h3>Change Password</h3>
<form method='post'>
    <input type="password" name="originalpassword" placeholder="Original Password" minlength="0" maxlength="30" required>
    <input type="password" name="newpassword1" placeholder="New Password" required minlength="6" maxlength="30" required>
    <input type="password" name="newpassword2" placeholder="Comfirm New Password" required minlength="6" maxlength="30" required>
    <br>
    <input type="submit" value="Confirm New Password" name="submitnewpass">
</form>

<?php
    $usernamedata = mysqli_query($connection,"SELECT * FROM sgsignin WHERE username = '$username';");
    $userinfo = mysqli_fetch_array($usernamedata) or die(mysqli_error($connection));

    @$ogpassword = filter_var($_POST['originalpassword'], FILTER_SANITIZE_STRING);
    @$newpassword1 = filter_var($_POST['newpassword1'], FILTER_SANITIZE_STRING); 
    @$newpassword2 = filter_var($_POST['newpassword2'], FILTER_SANITIZE_STRING); 

if (isset($_POST['submitnewpass'])){
    if(!empty($newpassword1 && $newpassword2)){
        if (password_verify($ogpassword, $userinfo['password'])) {
            if ($newpassword1 == $newpassword2){
                $hashedpass = password_hash($newpassword1, PASSWORD_BCRYPT, ['cost' => 14]);
                mysqli_query ($connection,"UPDATE sgsignin SET password='$hashedpass' WHERE userkey ='$userkey'");
                echo "Password Updated";
            }else{
                echo "The New Password don't Match";
            }
        }else{
            echo "Password incorrect";
        }
    }else{
        echo "Password cannot be empty";
    }
}

?>
<br><br>
<h3>Change Username - doesn't work yet</h3>
<form method='post'>
    <input type="password" name="new_username" placeholder="New Username" minlength="0" maxlength="30" required>
    <input type="password" name="name_change_pass" placeholder="Comfirm Password" required minlength="6" maxlength="30" required>
    <br>
    <input type="submit" value="Confirm New Password" name="submitnewpass">
</form>



<form method="post">
<br><br><input type="button" onclick="location='../game/home.php'" value="Home">
</form>

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



<?php
    
//!UPDATE ACCOUNT PASSWORD
if(isset($_POST['submitnewpass'])){

    $usernamedata = mysqli_query($connection,"SELECT * FROM sgsignin WHERE username = '$username';");
    $userinfo = mysqli_fetch_array($usernamedata) or die(mysqli_error($connection));

    @$ogpassword = filter_var($_POST['originalpassword'], FILTER_SANITIZE_STRING);
    @$newpassword1 = filter_var($_POST['newpassword1'], FILTER_SANITIZE_STRING); 
    @$newpassword2 = filter_var($_POST['newpassword2'], FILTER_SANITIZE_STRING); 

    if(!empty($newpassword1 && $newpassword2)){
        if (password_verify($ogpassword, $userinfo['password'])) {
            if ($newpassword1 == $newpassword2){
                $hashedpass = password_hash($newpassword1, PASSWORD_BCRYPT, ['cost' => 14]);
                mysqli_query ($connection,"UPDATE sgsignin SET password='$hashedpass' WHERE userkey ='$userkey'");
                echo "<div class=\"note_good\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Your Password was Updated.
                </div>"; 
            }else{
                echo "<div class=\"note_warn\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                The New Passwords don't match.
                </div>"; 
            }
        }else{
            echo "<div class=\"note_warn\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Password is incorrect.
                </div>"; 
        }
    }else{
        echo "<div class=\"note_warn\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Password cannot be left empty.
                </div>"; 
    }
}

//!UPDATE ACCOUNT USERNAME
if(isset($_POST['submitnewusername'])){
    
    $usernamedata2 = mysqli_query($connection,"SELECT * FROM sgsignin WHERE userkey = '$userkey';");
    $userinfo2 = mysqli_fetch_array($usernamedata2) or die(mysqli_error($connection));

    @$password_confirm = filter_var($_POST['name_change_pass'], FILTER_SANITIZE_STRING);
    @$new_username = filter_var($_POST['new_username'], FILTER_SANITIZE_STRING); 

    $data_check = mysqli_query($connection,"SELECT * FROM sgsignin WHERE username = '$new_username';");
    $username_check = mysqli_fetch_array( $data_check );

    if(!empty($new_username || $name_change_pass)){
        if (password_verify($password_confirm, $userinfo2['password'])) {
            if ($username_check['username'] !== $new_username || strtolower($username_check['username']) !== strtolower($new_username)){
                mysqli_query ($connection,"UPDATE sgsignin SET username='$new_username' WHERE userkey ='$userkey'");
                $_SESSION['username'] = $new_username;
                echo "<div class=\"note_good\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Username was Updated.
                </div>";        

            }else{
                
                echo "<div class=\"note_warn\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Username already taken, Please try another one!
                </div>"; 
                
            }
            
        }else{
            echo "<div class=\"note_warn\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Password is incorrect.
                </div>";
        }
    }else{
        echo "<div class=\"note_warn\">
            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
            Username or Password cannot be empty.
            </div>";
    }
}

?>

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


<br><br>
<h3>Change Username</h3>
<form method='post'>
    <input type="text" name="new_username" placeholder="New Username" minlength="0" maxlength="30" required>
    <input type="password" name="name_change_pass" placeholder="Comfirm Password" required minlength="6" maxlength="30" required>
    <br>
    <input type="submit" value="Confirm New Password" name="submitnewusername">
</form>


<form method="post">
<br><br><input type="button" onclick="location='../game/home.php'" value="Home">
</form>

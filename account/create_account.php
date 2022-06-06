<?php 
    require_once('../extras/important/require_me.php');
    $_SESSION['signin']='false'; 
    
?>
<!DOCTYPE html>

<body style="text-align: center">
    <!--Headings-->
    <div class="topheading"><img src="../images/logo2.png" style="width: 200px;"></div>
</body>

<?php


require ('../extras/important/connect.php');

@$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING); 
@$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
@$password2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);

@$key = $_POST['userkey'];

$data = mysqli_query($connection,"SELECT * FROM sgsignin WHERE username = '$username';");
$info = mysqli_fetch_array( $data );

$data2 = mysqli_query($connection,"SELECT * FROM sgsignin;");
$info2 = mysqli_fetch_array( $data2 );

if (isset($_POST['submit'])){
    if($password == $password2){
        if ($info['username'] == $username){
            echo "<div class=\"note_warn\">
            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
            Username already taken, Please try another one!
            </div>";
        }else{
            include 'generate_code.php';
            $key;
            do{
                include 'generate_code.php';
                $key;
            }while ($info2['userkey'] == $key);
            //password hashing
            $hashedpass = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
            //end of password hashing
            mysqli_query ($connection,"INSERT INTO sgsignin (username, password, userkey) VALUES('$username','$hashedpass','$key')");
            echo "<div class=\"note_good\">
            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
            Account Created, Redirecting...
            </div>";
            header( "refresh:2; url=sign_in.php");
}

    }else{
        echo "<div class=\"note_warn\">
            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
            The Password are not the same please try again
            </div>";
    }
}

?>

<br>
<h2>Create Account</h2>

<form method="post">
    <input type='text' name='username' placeholder='enter username' minlength="1" maxlength="30" required>
    <input type='password' name='password' placeholder='enter password' minlength="6" maxlength="30" required>
    <input type='password' name='password2' placeholder='confirm password' minlength="6" maxlength="30" required>
    <br><br>
    <input type='submit' name='submit' value='Create Account'>
        
    
</form>


<br><br><br>
<h5>All Usernames and passwords are case sensitive!</h5>

<h5>If you already have and account please <input type='button' onclick='location="sign_in.php"' value='Sign In'></h5>
<input type="button" onclick="location='../index.php'" value="Home">
<!DOCTYPE html>
<body>

<?php
//sign in check
@session_start();
  @$username = $_SESSION['username'];
  @$userkey = $_SESSION['key']; //your userkey
  @$signin = $_SESSION['signin'];
  
if($signin=='false'||empty($userkey)||empty($username)){
    session_destroy();
    header( "refresh:0; url=../index.php");
    exit();
}    
?>
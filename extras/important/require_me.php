<?php

@session_start();
@$username = $_SESSION['username'];
@$userkey = $_SESSION['key']; //your userkey
@$signin = $_SESSION['signin'];
  


echo $current_dir = $_SERVER['SCRIPT_NAME'];
$page_name = basename($current_dir,'.php');
$modular_dir = substr_count($current_dir,"/");


$modular_dir = $modular_dir - 3;
$x = 0;
$dir = '';


while($x < $modular_dir ){
$x++;
$dir = '../'.$dir;
}

echo '<link rel="stylesheet" href="'.$dir.'css/stylesheet.css">';


$sign_in_true = array('home','game','leader','lose','game_mode','pets');

if (in_array($page_name, $sign_in_true)){
  echo 'sign in true';
  if($signin=='false'||empty($userkey)||empty($username)||empty($signin)){
    session_destroy();
    header( "refresh:0; url=".$dir."index.php");
    exit();
  } 
}

$no_page_access = array('require_me','needed','connect','money','net_worth','rent_price','share1','share2','pet_function_day','pet_function_rent');

if (in_array($page_name, $no_page_access)){
  session_destroy();
  header( "refresh:0; url=".$dir."index.php");
  exit();
}


?>
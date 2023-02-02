<?php
//? start session
@session_start();

//? authentication  
@$username = $_SESSION['username'];
@$userkey = $_SESSION['key']; //your userkey
@$signin = $_SESSION['signin'];

$current_dir = $_SERVER['SCRIPT_NAME'];
$page_name = basename($current_dir,'.php');
$modular_dir = substr_count($current_dir,"/");

$modular_dir -= 3;
$x = 0;
$dir = '';


while($x < $modular_dir ){
  $x++;
  $dir = '../'.$dir;
}

//? check if user needs to be signed in
$sign_in_true = array('home','game','leader','lose','game_mode','pets','account','report');
if (in_array($page_name, $sign_in_true)){
  if($signin=='false'||empty($userkey)||empty($username)||empty($signin)){
    
    if(@$_COOKIE['sg_login'] >= 1){
      $cookie_value = $_COOKIE['sg_login'];
      $cookie_value++;
      setcookie('sg_login', $cookie_value, time() + (86400 * 1), "/");
    }else{
      setcookie('sg_login', 1, time() + (86400 * 1), "/");
    }
    session_destroy();
    header( "refresh:0; url=".$dir."index.php");
    exit();
  } 
}

//? check for incorrect page usage
$no_page_access = array('require_me','needed','connect','money','net_worth','rent_price','share1','share2','pet_function_day','pet_function_rent','price_change','load','button_functions','data_test','generate_code','validate_pet','functions','main_buttons','side_bar','rent_day');
if (in_array($page_name, $no_page_access)){
  
  if(@$_COOKIE['sg_login'] >= 1){
    $cookie_value = $_COOKIE['sg_login'];
    $cookie_value++;
    setcookie('sg_login', $cookie_value, time() + (86400 * 1), "/");
  }else{
    setcookie('sg_login', 1, time() + (86400 * 1), "/");
  }
  session_destroy();
  header("refresh:0; url=".$dir."index.php");
  exit();
}

//make sure cookie is not broken
if(@$_COOKIE['sg_login'] >= 6){
  echo '<h1>Sorry You Have Been Locked Out.</h1>';
  echo '<p>please come back again later.</p>';
  echo '<p>to be unlocked it may take a few days.</p>';
  exit();
}


echo '<link rel="stylesheet" href="'.$dir.'css/stylesheet.css">';
echo '<link href="'.$dir.'images/icon/favicon.ico" rel="icon" type="image/x-icon" />';
require_once $dir.'extras/important/connect.php';
require_once $dir.'extras/assets/functions.php';
require_once $dir.'extras/assets/num_letter.php';

//? page tittle
$page_name_1 = str_replace('_',' ',$page_name);
$read_page_name = ucwords($page_name_1);
echo '<title>Shares Game - '.$read_page_name.'</title>';

//? game version 
$game_version = '6.2';

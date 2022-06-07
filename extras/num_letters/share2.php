<?php
//number to letter
if($page_name != 'game'){
    require('../important/require_me.php');
}

$n = '';
$m = '';
$r = '';    

$n = $sale2;

    if ($n >0 && $n < 1000){
        $m = $n;
    }elseif ($n >= 1000 && $n < 1000000){
        $r = $n / 1000;
        $r = round($r,4);
        $m = $r."K";
    }elseif ($n >= 1000000 && $n < 1000000000){
        $r = $n / 1000000;
        $r = round($r,4);
        $m = $r."M";
    }elseif ($n >= pow(10,9) && $n < pow(10,12)){
        $r = $n / pow(10,9);
        $r = round($r,4);
        $m = $r."B";
    }elseif ($n >= pow(10,12) && $n < pow(10,15)){
        $r = $n / pow(10,12);
        $r = round($r,4);
        $m = $r."T";
    }elseif ($n >= pow(10,15) && $n < pow(10,18)){
        $r = $n / pow(10,15);
        $r = round($r,4);
        $m = $r."Qa";
    }elseif ($n >= pow(10,18) && $n < pow(10,21)){
        $r = $n / pow(10,18);
        $r = round($r,4);
        $m = $r."Qi";
    }elseif ($n >= pow(10,21) && $n < pow(10,24)){
        $r = $n / pow(10,21);
        $r = round($r,4);
        $m = $r."Sx";
    }elseif ($n >= pow(10,24) && $n < pow(10,27)){
        $r = $n / pow(10,24);
        $r = round($r,4);
        $m = $r."Sp";
    }elseif ($n >= pow(10,27) && $n < pow(10,30)){
        $r = $n / pow(10,27);
        $r = round($r,4);
        $m = $r."Oc";
    }elseif ($n >= pow(10,30) && $n < pow(10,33)){
        $r = $n / pow(10,30);
        $r = round($r,4);
        $m = $r."No";
    }elseif ($n >= pow(10,33) && $n < pow(10,36)){
        $r = $n / pow(10,33);
        $r = round($r,4);
        $m = $r."De";
    }elseif ($n >= pow(10,36) && $n < pow(10,39)){
        $r = $n / pow(10,36);
        $r = round($r,4);
        $m = $r."Un";
    }elseif ($n >= pow(10,39) && $n < pow(10,42)){
        $r = $n / pow(10,39);
        $r = round($r,4);
        $m = $r."Du";
    }elseif ($n >= pow(10,42) && $n < pow(10,45)){
        $r = $n / pow(10,42);
        $r = round($r,4);
        $m = $r."Tr";
    }elseif ($n >= pow(10,45) && $n < pow(10,48)){
        $r = $n / pow(10,45);
        $r = round($r,4);
        $m = $r."QaD";
    }elseif ($n >= pow(10,48) && $n < pow(10,51)){
        $r = $n / pow(10,48);
        $r = round($r,4);
        $m = $r."QiD";
    }elseif ($n >= pow(10,51) && $n < pow(10,54)){
        $r = $n / pow(10,51);
        $r = round($r,4);
        $m = $r."SxD";
    }elseif ($n >= pow(10,54) && $n < pow(10,57)){
        $r = $n / pow(10,54);
        $r = round($r,4);
        $m = $r."SpD";
    }
    
    
    else{
        $m = $n;
    }
    $sale2L = $m;

    ?>
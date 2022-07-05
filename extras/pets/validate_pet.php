<?php
    if($page_name != 'game'){
        require('../important/require_me.php');
    }
    //if(empty($_SESSION['pets'])){
    //    $_SESSION['pets'] = 'none';
    //}
    @$pet = $_SESSION['pets'];

    $user_pet_data2 = mysqli_query($connect,"SELECT * FROM sg_pets WHERE UserKey = '$userkey';");
    $user_pet_info2 = mysqli_fetch_array( $user_pet_data2 );

    if(empty($user_pet_info2)){
        mysqli_query ($connect,"INSERT INTO sg_pets (UserKey) VALUES('$userkey')");
    }

    if(!empty($pet)||$pet !== 'none'){
        if (@$user_pet_info2["$pet"] == 1){
        }elseif($pet !== 'none'){
            $_SESSION['pets'] = 'none';
            echo "<div class=\"note_warn\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                you have not unlocked this pet yet!
            </div>";
        }
    }


?>
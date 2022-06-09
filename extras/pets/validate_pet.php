<?php
    if($page_name != 'game'){
        require('../important/require_me.php');
    }
    //if(empty($_SESSION['pets'])){
    //    $_SESSION['pets'] = 'none';
    //}
    @$pet = $_SESSION['pets'];

    $user_pet_data = mysqli_query($connection,"SELECT * FROM sg_pets WHERE UserKey = '$userkey';");
    $user_pet_info = mysqli_fetch_array( $user_pet_data );

    if(empty($user_pet_info)){
        mysqli_query ($connection,"INSERT INTO sg_pets (UserKey) VALUES('$userkey')");
    }

    if(!empty($pet)||$pet !== 'none'){
        if (@$user_pet_info["$pet"] == 1){
        }elseif($pet !== 'none'){
            $_SESSION['pets'] = 'none';
            echo "<div class=\"note_warn\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                you have not unlocked this pet yet!
            </div>";
        }
    }


?>
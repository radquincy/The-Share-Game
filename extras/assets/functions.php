<?php

    function notification($type, $message){
        echo "<div class=\"note_$type\">
            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
            $message
            </div>"; 
    }

    function sgsignin_username($username_var,$database_connection){
        $user_data = mysqli_query($database_connection,"SELECT * FROM sg_users WHERE username = '$username_var';");
        $user_info = mysqli_fetch_array($user_data);
        return $user_info;
    }

    function savegame_key($user_key,$database_connection){
        $data = mysqli_query($database_connection,"SELECT * FROM sg_save WHERE UserKey = '$user_key';");
        $info = mysqli_fetch_array( $data );
        return $info;
    }

    function sg_pets_key($user_key,$database_connection){
        $data = mysqli_query($database_connection,"SELECT * FROM sg_pets WHERE UserKey = '$user_key';");
        $info = mysqli_fetch_array( $data );
        return $info;
    }

    function user_stats($user_key_var,$database_connection){
        $user_stats_data = mysqli_query($database_connection,"SELECT * FROM sg_stats WHERE UserKey = '$user_key_var';");
        $user_info2 = mysqli_fetch_array($user_stats_data);
        return $user_info2;
    }

    function unlock_pets($userkey, $connect, $pet){
        mysqli_query ($connect,"UPDATE sg_pets SET $pet = 1 WHERE UserKey = '$userkey'");
    }

    function echo_pet_info($user_pet_info, $pet, $rarity, $unlocked_msg, $locked_msg){

        if($user_pet_info["$pet"] == 1){
            echo "<img src=\"../images/pets/$pet.png\" style=\"width: 100%;\">";
        }else{
            echo "<img src=\"../images/pets/unlock/$pet.png\" style=\"width: 100%;\">";
        }

        echo '<span class="tooltiptext">';
        
            if($user_pet_info["$pet"] == 1){
                echo $unlocked_msg;
            }else{
                echo $locked_msg;
            }
            echo "<div id=\"$rarity\">[$rarity]</div>";
        echo '</span>';
    }
?>
<?php

    function notification($type, $message){
        echo "<div class=\"note_$type\">
            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
            $message
            </div>"; 
    }

    function sgsignin_username($username_var,$database_connection){
        $user_data = mysqli_query($database_connection,"SELECT * FROM sgsignin WHERE username = '$username_var';");
        $user_info = mysqli_fetch_array($user_data);
        return $user_info;
    }

    function savegame_key($user_key,$database_connection){
        $data = mysqli_query($database_connection,"SELECT * FROM savegame WHERE UserKey = '$user_key';");
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
?>
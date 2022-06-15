<?php

function roomchecker() {
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    if (isset($_SESSION["password"]) && isset($_SESSION["roomname"]) && isset($_SESSION["user"])) {

        include "db_con.php";
        $password = $_SESSION["password"];
        $roomname = $_SESSION["roomname"];
        $username = $_SESSION["user"];
        
        include "getpass.php";
        $decrypted_password = encrypter($password);
        // Execute sql to check whether room exists
        $sql = "SELECT * FROM `rooms` WHERE room_name = '$roomname'";
    
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            //check if room exist
            if (mysqli_num_rows($result) == 0) {
                // if room does not exist
                return false;
            } else {
                // if room exist
    
                // query
                $query = "SELECT * FROM `rooms` WHERE room_name = '$roomname' AND  passwords = '$decrypted_password' ";
    
                //result of query
                $result1 = mysqli_query($conn, $query);
    
                //check if roomname and password is same

                if (mysqli_num_rows($result1) == 1) { //if true
                    // echo "<br> eyerything is best";
                    return true;
                }
                else {
                    return false;
                }
            }
        } else {
            return false;
        }
        // mysqli_close($conn);
    } else {
        return false;
    }
}

// roomchecker();
?>
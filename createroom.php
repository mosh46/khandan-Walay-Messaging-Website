<?php
if (!isset($_SESSION)) {
    session_start();
}

$username = $_POST["user"];
$password = $_POST["pass"];
$roomname = $_POST["room"];

// str_replace ($search, $replace, $subject);

$username =  str_replace(">", "&gt", $username);
$username = str_replace("<", "&lt", $username);
$username = str_replace('"', "&quot", $username);
$username = str_replace("'", "&apos", $username);
$roomname = str_replace(">", "&gt", $roomname);
$roomname = str_replace("<", "&lt", $roomname);
$roomname = str_replace('"', "&quot", $roomname);
$roomname = str_replace("'", "&apos", $roomname);

if (isset($username) && isset($password) && isset($roomname)) {
    include "db_con.php";
    include "getpass.php";

    // $username = mysqli_real_escape_string($conn, $username);
    // $roomname = mysqli_real_escape_string($conn, $roomname);
    $password = encrypter($password);

    $sql = "SELECT * FROM `rooms` WHERE room_name = '$roomname'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        //check if room exist
        if (mysqli_num_rows($result) > 0) {
            // if room does not exist
            echo '<script type="text/JavaScript"> 
            alert("room already exist, try a different name");
            window.location.href = "index.php";
            </script>';
        } else {

            $query = "INSERT INTO `rooms` (`room_name`, `date_created`, `passwords`) VALUES ('$roomname', current_timestamp(), '$password');";

            if (mysqli_query($conn, $query)) {

                // when room created successfully

                $password = decrypter($password);
                $_SESSION["roomname"] = $roomname;
                $_SESSION["password"] = $password;
                $_SESSION["user"] = $username;
                echo '<script type="text/JavaScript">
            window.location.href = "chatrooooms.php";
            </script>';
            } else {
                echo '<script type="text/JavaScript"> 
                alert("you have not created a chatroom yet!");
                window.location.href = "index.php";
                </script>';
            }
        }
    }
    mysqli_close($conn);
}
?>
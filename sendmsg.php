<?php

$message = $_POST["message"];
$roomname = $_POST["roomn"];
$username = $_POST["usern"];

include "db_con.php";

include "getpass.php";
$message = encrypter($message);

$query = "INSERT INTO `messages` (`room_name`, `sender_name`, `msgtime`, `message`) VALUES ('$roomname', '$username', current_timestamp(), '$message');";

if (mysqli_query($conn, $query)) {
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>

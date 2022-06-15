
<?php


include "db_con.php";

$roomname = $_POST["roomn"];
$username = $_POST["usern"];


$query = "SELECT * FROM `messages` WHERE room_name = '$roomname'";

$res = "";

$result = mysqli_query($conn, $query);

include "getpass.php";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $datetime = explode(" ", $row['msgtime']);
        $fulltime =  explode(":", $datetime[1]);
        $time = $fulltime[0].':'. $fulltime[1];
        $message = $row['message'];
        $message = decrypter($message); 

        if ($username == $row['sender_name']) {
            $res = $res . '<div class="msg right-msg">';
            $res = $res . '<div class="msg-bubble">';
            
            $res = $res . '<div class="msg-info">';
            $res = $res . '<div class="msg-info-name">'. $row['sender_name'] .'</div>';
            $res = $res . '<div class="msg-info-time">'. $time . '</div>';
            $res = $res . '</div>';
            
            $res = $res . '<div class="msg-text">';
            $res = $res . $message;
            $res = $res . '</div>';
            
            $res = $res . '</div>';
            $res = $res . '</div>';
        }
        else{
            $res = $res . '<div class="msg left-msg">';
            $res = $res . '<div class="msg-bubble">';
            
            $res = $res . '<div class="msg-info">';
            $res = $res . '<div class="msg-info-name">'. $row['sender_name'] .'</div>';
            $res = $res . '<div class="msg-info-time">'. $time . '</div>';
            $res = $res . '</div>';
            
            $res = $res . '<div class="msg-text">';
            $res = $res . $message;
            $res = $res . '</div>';
            
            $res = $res . '</div>';
            $res = $res . '</div>';
        }

    }
}
else
{
    $res = "<h1 style='text-align:center;color: rgb(25, 107, 107);'>Start Your Chat Now!</h1>";
}

echo $res;

?>
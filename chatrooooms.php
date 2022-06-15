<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["room"])) {

    $username = $_POST["user"];
    $password = $_POST["pass"];
    $roomname = $_POST["room"];

    $_SESSION["roomname"] = $roomname;
    $_SESSION["password"] = $password;
    $_SESSION["user"] = $username;
}

include "roomcheck.php";
$password = $_SESSION["password"];
$roomname = $_SESSION["roomname"];
$username = $_SESSION["user"];

$username =  str_replace(">", "&gt", $username);
$username = str_replace("<", "&lt", $username);
$username = str_replace('"', "&quot", $username);
$username = str_replace("'", "&apos", $username);
$roomname = str_replace(">", "&gt", $roomname);
$roomname = str_replace("<", "&lt", $roomname);
$roomname = str_replace('"', "&quot", $roomname);
$roomname = str_replace("'", "&apos", $roomname);

if (roomchecker()) {
    echo '<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>';

    echo '<script type="text/JavaScript">
    $(document).ready(function(){
    alert("welcome ' . $username . '");
    })
    </script>';
} else {
    echo '<script type="text/JavaScript"> 
    alert("username or password is incorrect");
    window.location.href = "index.php";
    </script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatroom - <?php echo $roomname; ?></title>
    <link rel="stylesheet" href="css/chatroomss.css">

</head>

<body>
    <section class="msger">
        <header class="msger-header">
            <div class="msger-header-title">
                <h1><?php echo $roomname; ?></h1>
                <button class="logout-btn" id="logout">Log out</button>
            </div>
            <div class="msger-header-options">
                <span><i class="fas fa-cog"></i></span>
            </div>
        </header>

        <main class="msger-chat" id="msg-box">

        </main>

        <div class="msger-inputarea">
            <input type="text" class="msger-input" id="msg" placeholder="Enter your message...">
            <a class="msger-send-btn" id="send-btn" onclick="send()">Send</a>
        </div>

    </section>





    <!--/////////////////// js //////////////////////////////////////////////-->

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- <script src="js/jquery.redirect.js"></script> -->

    <script>
        let objDiv = document.getElementById("msg-box");
        objDiv.scrollTop = objDiv.scrollHeight;

        let userna = "<?php echo $username; ?>";
        let roomna = "<?php echo $roomname; ?>";

        setInterval(getmsg, 500);

        function getmsg(){
            $.post("getmsgs.php", {
                usern:userna,
                roomn:roomna
            }).done(function(data) {
                    // alert( "Data Loaded: " + data );
                    document.getElementsByClassName("msger-chat")[0].innerHTML = data
                });
        }

        $(document).on('keypress', function(e) {
            if (e.which == 13) {
                // alert('User pressed Enter!');
                $("#send-btn").click();
            }
        });

        function send() {
            let msg = document.getElementById("msg");
            let msg_value = document.getElementById("msg").value;

            // alert("select");
            if (msg_value.length == 0) {
                alert("message cannot be null")
            } else {
                $.post("sendmsg.php", {
                    message: msg_value,
                    usern: userna,
                    roomn: roomna

                }).done(function(data) {
                    // alert( "Data Loaded: " + data );
                    msg.value = "";
                });
            }
        };

        $("#logout").click(function() {
            <?php //echo "log out";
            session_destroy(); ?>
            alert("logged out");
            window.location.href = "index.php";
        });
    </script>
</body>

</html>
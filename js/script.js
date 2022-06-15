
// alert("running from external js");

function display_create() {
    document.getElementById("existing-room").style.display = "none";
    document.getElementById("creating-room").style.display = "block";
    $(document).on('keypress', function(e) {
        if (e.which == 13) {
            // alert('User pressed Enter!');
            $("#createroom").click();
        }
        });
};

function display_existing() {
    document.getElementById("creating-room").style.display = "none";
    document.getElementById("existing-room").style.display = "block";
    $(document).on('keypress', function(e) {
    if (e.which == 13) {
        // alert('User pressed Enter!');
        $("#joinroom").click();
    }
    });
};

function toggle(id) {

    if (document.getElementById(id).getAttribute("type") == "text") {
        document.getElementById(id).setAttribute("type", "password");
    }
    else {
        document.getElementById(id).setAttribute("type", "text");
    }
};
$("#joinroom").click(function () {
    let username = document.getElementById("user-name-existing").value;
    let password = document.getElementById("room-pass-existing").value;
    let roomname = document.getElementById("room-name-existing").value.toLowerCase();

    // alert(`username:${username} password:${password} roomname:${roomname}`);
    if (username.length < 2 || roomname.length < 5 || password.length < 0) {
        alert("values are very short")
    }
    else {
        $.redirect(`chatrooms.php`, { user: username, pass: password, room: roomname }, "POST");
        // alert(password);
    }
});

$("#createroom").click(function () {
    let username = document.getElementById("user-name").value;
    let password = document.getElementById("room-pass").value;
    let roomname = document.getElementById("room-name").value.toLowerCase();

    // alert(`username:${username} password:${password} roomname:${roomname}`);
    if (username.length < 2 || roomname.length < 5 || password.length < 0) {
        alert("values are very short(minimum length should  be 5 for each field)")
    }
    else {
        $.redirect("createroom.php", { user: username, pass: password, room: roomname }, "POST");
        // alert("success");
    }
});
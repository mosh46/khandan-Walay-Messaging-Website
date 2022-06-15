<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
include "roomcheck.php";

if(roomchecker()){
  echo '<script type="text/JavaScript"> 
  window.location.href = "chatrooooms.php";
  </script>';
}

?>
<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Khandan Walay</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    label {
      cursor: pointer;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body class="d-flex h-100 text-center text-white bg-dark">

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
      <div>
        <h3 class="float-md-start mb-0 head">K_W</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </nav>
      </div>

      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </header>

    <main class="px-3">
      <h1>KHANDAN WALAY CHATROOM</h1>
      <p class="lead">Welcome To The World's Safest Chatroom</p>
      <p class="lead">
        <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white button" onclick="display_create()">Creat a room</a>
        <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white button" onclick="display_existing()">Connect to an existing
          room</a>
      </p>

      <!-- for creating room -->
      <div id="creating-room">

        <div class="input-group mb-3">
          <!-- user-name -->
          <label class="input-group-text" for="user-name">User Name</label>
          <input type="text" class="form-control" placeholder="User Name" id="user-name" aria-describedby="addon-wrapping">
        </div>

        <div class="input-group">
          <!-- room-name -->
          <label class="input-group-text" for="room-name">Room Name</label>
          <input type="text" class="form-control" placeholder="Room Name" id="room-name" aria-describedby="addon-wrapping">
        </div>

        <div class="input-group mt-3">
          <label class="input-group-text" for="room-pass">Room Password</label>
          <input type="password" placeholder="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="room-pass">
          <!-- <i class="fas fa-eye" id="togglePassword" onclick="toggle('room-pass')"></i> -->
        </div>
        <button type="button" class="btn btn-success mt-3" id="createroom">Create</button>
      </div>

      <!-- for existing room -->

      <div id="existing-room">

        <div class="input-group mb-3">
          <!-- user-name -->
          <label class="input-group-text" for="user-name-existing">User Name</label>
          <input type="text" class="form-control" placeholder="User Name" id="user-name-existing" aria-describedby="addon-wrapping">
        </div>

        <div class="input-group mb-3">
          <!-- room-name -->
          <label class="input-group-text" for="room-name-existing">Room Name</label>
          <input type="text" class="form-control" placeholder="Room Name" id="room-name-existing" aria-describedby="addon-wrapping">
        </div>

        <div class="input-group mt-3">
          <label class="input-group-text" for="room-pass-existing">Room Password</label>
          <input style="margin: 0;" type="password" placeholder="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="room-pass-existing">
          <!-- <i class="fas fa-eye" id="togglePassword2" onclick="toggle('room-pass-existing')"></i> -->
        </div>
        <button type="button" class="btn btn-success mt-3" id="joinroom">Join</button>
      </div>

    </main>

    <footer class="mt-auto text-white-50">
      <p>made by <a href="https://twitter.com/S_Uzair_Asif">Uzair Asif</a></p>
    </footer>
  </div>


  <!-- <script src="jquery.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/script.js"></script>
    <script src="js/jquery.redirect.js"></script>

</body>

</html>
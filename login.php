<?php
// login.php (or the script that handles the login)
session_start();

if(isset($_POST['login'])){
  $user = isset($_POST['username']) ? $_POST['username'] : '';
  $pass = isset($_POST['password']) ? $_POST['password'] : '';

  if($user=='admin' AND $pass=="admin123") {
    $_SESSION['username'] = $user;
    header("Location: dashboard.php");
    exit();
  } else {
    echo '<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
    Login gagal. Username atau password salah.
  </div>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .alert {
      margin-top: 10px;
      padding: 10px;
      background-color: #f44336;
      color: white;
      margin-bottom: 15px;
    }

    .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }

    .closebtn:hover {
      color: black;
    }

    .container {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-card {
      width: 400px;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-between;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      background: white;
    }

    .login-form {
      flex: 1;
      margin-right: 20px;
    }

    .login-image {
      flex: 1;
      margin-left: 20px;
    }

    .login-image img {
      width: 100%;
      height: 200%;
    }

    body {
            background-image: url("https://png.pngtree.com/thumb_back/fw800/background/20210326/pngtree-western-musical-instrument-music-background-image_594365.jpg");
            background-size: cover; /* Ensure the background image covers the entire screen */
            background-repeat: no-repeat; /* Prevent the background image from repeating */
            background-position: center center; /* Center the background image */
            height: 100vh; /* Ensure the body takes up the full height of the viewport */
            margin: 0; /* Remove default margin */
        }
  </style>
  <script>
    $(document).ready(function() {
      $('.closebtn').click(function() {
        $(this).parent().fadeOut();
      });
    });
  </script>
</head>
<body>

  <div class="container">
    <div class="login-card">
      <div class="login-form">
        <h2 class="text-center mb-4">Login Aplikasi</h2>

        <form method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
        </form>
      </div>
      <div class="login-image">
        <img src="https://png.pngtree.com/thumb_back/fw800/background/20210331/pngtree-western-musical-instrument-music-background-image_601863.jpg" class="d-block mx-auto my-5" style="max-width: 200px, max-height: 150px;" alt="">
      </div>
    </div>
  </div>
  <div class="modal fade" id="loginFailedModal" tabindex="-1" aria-labelledby="loginFailedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginFailedModalLabel">Login Gagal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger">Login gagal. Username atau password salah.</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
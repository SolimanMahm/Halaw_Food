<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
  }
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");

  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO users VALUES('','$name','$username','$email','$hashed_password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
      header('location:login.php');
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <title>Registration</title>
  <link rel="stylesheet" href="css/style1.css">

  <style>
    input {
      text-align: center;
    }

    body {
      background-image: url(images/Halawa.jpg);
      background-size: cover;
    }
  </style>

</head>

<body>
  <div class="container">
    <div class="forms">
      <div class="form login">
        <span class="title">Sign up</span>

        <form action="" method="post" autocomplete="off">

          <div class="input-field">
            <input type="text" name="name" id="name" placeholder="Enter name" required>
            <i class="uil uil-user"></i>
          </div>

          <div class="input-field">
            <input type="text" name="username" id="username" placeholder="Enter username" required>
            <i class="uil uil-user"></i>
          </div>

          <div class="input-field">
            <input type="email" name="email" id="email" placeholder="Enter Email" required>
            <i class="uil uil-envelope"></i>
          </div>

          <div class="input-field">
            <input type="password" name="password" id="password" placeholder="Enter password" required>
            <i class="uil uil-lock icon"></i>

          </div>

          <div class="input-field">
            <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required>
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>

          <div class="input-field button">
            <button type="submit" name="submit">Sign up</button>
          </div>
        </form>
        <div class="login-signup">
          <span class="text">Already have an account?
            <a href="login.php" class="text signup-link">Login</a>
          </span>
        </div>
      </div>
    </div>
  </div>

  <script src="script.js"></script>
</body>

</html>

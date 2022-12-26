<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
  }
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usernameemail' or email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    $password_hash = $row['password'];
    if(password_verify($password, $password_hash)){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];

        header("Location: products.php");
    }


    /* if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    } */
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    if($usernameemail == "admin" && $password == "admin"){
      header("Location: admin.php");
    }
    echo "<script> alert('User Not Registered'); </script>";
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
  <title>Login</title>

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
        <span class="title">Login</span>

        <form action="" method="post" autocomplete="off">
          <div class="input-field">
            <input type="text" name="usernameemail" id="usernameemail" placeholder="Enter username or Email" required>
            <i class="uil uil-envelope"></i>
          </div>

          <div class="input-field">
            <input type="password" name="password" id="password" placeholder="Enter password" required>
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>

          <div class="input-field button">
            <button type="submit" name="submit">Login</button>
          </div>
        </form>
        <div class="login-signup">
          <span class="text">Need an account?
            <a href="registration.php" class="text login-link">Sign up</a>
          </span>
        </div>
      </div>
    </div>
  </div>

  <script src="script.js"></script>

</body>

</html>

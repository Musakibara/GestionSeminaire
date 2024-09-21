<?php
session_start();
if (isset($_SESSION['erreurLogin']))
    $erreurLogin = $_SESSION['erreurLogin'];
else {
    $erreurLogin = "";
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Login </title>

  <link rel="shortcut icon" href="../images/favicon.svg" type="image/x-icon">
  <link rel="shortcut icon" href="../images/favicon.png" type="image/png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> -->
  
  <!-- <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">  -->
  <!-- <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'> -->
  <!-- <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap'> -->

  <link rel="stylesheet" href="../CSS/style.css">

</head>
<body>
<!-- partial:index.partial.html -->

<form action="seConnecter.php" method="post">
<div class="wrapper">
  <div class="login_box">
    <div class="login-header">
      <span>Login</span>
    </div>
      
    <div class="input_box">
      <input type="text" id="nom" name="nom" class="input-field" required autocomplete="off">
      <label for="nom" class="label">Username</label>
      <i class="bi bi-person-fill icon"></i>
    </div>

    <div class="input_box">
      <input type="password" id="mot_de_passe" name="mot_de_passe" class="input-field" required>
      <label for="mot_de_passe" class="label">Password</label>
      <i class="bi bi-eye-fill icon"></i>
    </div>

    <div class="remember-forgot">
      <div class="remember-me">
        <input type="checkbox" id="remember">
        <label for="remember">Remember me</label>
      </div>

      <div class="forgot">
        <a href="#">Forgot password?</a>
      </div>
    </div>

    <div class="input_box">
      <input type="submit" class="input-submit" value="Login">
    </div>

    <div class="register">
      <span>Don't have an account? <a href="#"> Register</a></span>
    </div>
  </div>
</div>
</form>
<!-- partial -->
  
</body>
</html>

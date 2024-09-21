<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title> Login </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="../images/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png">
  
  
  
    <link rel="stylesheet" href="../CSS/style2.css">

</head>
<body>

<section>
  <div class="form-box">
    <div class="form-value">
      <form action="connecterSecret.php" method="POST">
        <h2>Secretary login</h2>

        <div class="inputbox">
          <i class="bi bi-person-fill"></i>
          <input type="text" required name="nomSecret">
          <label for="nomSecret">Username</label>
        </div>
        <div class="inputbox">
          <i class="bi bi-lock-fill"></i>
          <input type="password" required name="mot_de_passe">
          <label for="mot_de_passe">Password</label>
        </div>
        <div class="forget">
          <label>
            <input type="checkbox"> Remember me
          </label>
          <label>
            <a href="mailto:admin@gmail.com">Forgot password?</a>
          </label>
        </div>
        <button>Log in</button>
        <div class="register">
          <p>Don't have a account ? <a href="mailto:admin@gmail.com">Register</a></p>
        </div>
      </form>
    </div>
  </div>
</section>

</body>
</html>

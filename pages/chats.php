<?php
    require_once('connexiondb.php');
    require_once('identifier.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat</title>
  <link rel="stylesheet" href="../CSS/style6.css">
</head>

<body>
  <h1>ChatCENADI</h1>
  <div class="chat">
    <h2>Welcome to <span><?php echo  ' '.$_SESSION['email']?></span></h2>
    <div class="msg">
      





    </div>
    <div class="input_msg">
      <input type="text" placeholder="Write msg Here..." id="input_msg">
      <button onclick="update()">Send</button>
    </div>
  </div>
</body>
<script src="../js/script.js"></script>

</html>

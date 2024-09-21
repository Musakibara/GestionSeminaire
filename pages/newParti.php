<?php 

    require_once("connexiondb.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Participant</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<!-- <link rel="stylesheet" href="../CSS/bootstrap.min.css"> -->
	<!-- <link rel="stylesheet" href="../CSS/monstyle.css"> -->
    <link rel="shortcut icon" href="../images/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png">

	<link rel="stylesheet" href="../CSS/styleFormuler.css">
</head>
<body>
	<form action="insertParti.php" method="post" enctype="multipart/form-data">
	<div class="container">
		<div class="form signup">
			<h2>Add Participant</h2>
			<div class="inputBox">
				<input type="text" required="required" title="Username must have atlest 4 caracters..." name="nomParti" autocomplete="off">
				<i class="bi bi-person-fill"></i>
				<span>Username</span>
			</div>
			<div class="inputBox">
				<input type="email" required="required" name="email" autocomplete="off">
				<i class="bi bi-envelope-fill"></i>
				<span>Email address</span>
			</div>
			<div class="inputBox">
				<input type="number" required="required" name="numTel" autocomplete="off">
				<i class="bi bi-phone-fill"></i>
				<span>phone number</span>
			</div>
			<div class="inputBox">
				<input type="text" required="required" name="nomStructure" autocomplete="off">
				<i class="bi bi-building-fill"></i>
				<span>Structure name</span>
			</div>
			<div class="inputBox">
				<input type="password" required="required" minlength="5" name="mot_de_passe" title="Your password must have atlest 5 caracters..." autocomplete="new-password">
				<i class="bi bi-lock-fill"></i>
				<span>Create password</span>
			</div>
			<div class="inputBox">
				<input type="file" name="photo">
				<i class="bi bi-blog-filll"></i>
				<span> Picture </span>
			</div>
			<div class="inputBox">
				<input type="submit" name="sub" value="Create Account">
			</div>
			<p>Already a participant ? <a href="#" class="login">Log in</a></p>

		</div>

	</div>
	</form>
</body>
</html>
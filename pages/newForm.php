<?php 

    require_once("connexiondb.php");
    require_once("../fonctions/fonctionForm.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Consultant</title>
    <link rel="shortcut icon" href="../images/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="../CSS/styleFormuler.css">
</head>
<body>
	<form action="insertForm.php" method="post">
	<div class="container">
		<div class="form signup">
			<h2>Add Consultant</h2>

			<div class="inputBox">
				<select name="typeConsultant" id="typeConsultant" required="required" class="input">
					<option value="interne" class="span">Interne</option>
					<option value="externe" class="span">Externe</option>
					<option value="mixte" class="span">Mixte</option>
				</select>
				<i class="bi bi-person-fill"></i>
			</div>
			<div class="inputBox">
				<input type="text" name="denomination" required="required" autocomplete="off" title="Enter the name of all the structures concerned">
				<i class="bi bi-building-fill"></i>
				<span>Denomination</span>
			</div>
			<div class="inputBox">
				<input type="text" required="required" autocomplete="off" name="formateur1" title="Your name must have at least 5 caracters...">
				<i class="bi bi-person-fill"></i>
				<span>First formative</span>
			</div>
			<div class="inputBox">
				<input type="text" required="required" autocomplete="off" name="formateur2" title="Your name must have at least 5 caracters...">
				<i class="bi bi-person-fill"></i>
				<span>Second formative</span>
			</div>
			<div class="inputBox">
				<input type="text" required="required" autocomplete="off" name="formateur3" title="Your name must have at least 5 caracters...">
				<i class="bi bi-person-fill"></i>
				<span>Third formative</span>
			</div>
			
            <div class="inputBox">
				<input type="number" name="numTel" required="required" autocomplete="off" title="Enter the numbers of ich of them by sapcing with 'et' and in order of name ">
				<i class="bi bi-phone-fill"></i>
				<span>Phone numbers</span>
			</div>
			<div class="inputBox">
				<input type="number" name="NIU" required="required" autocomplete="off">
				<i class="bi bi-phone-fill"></i>
				<span> NIU </span>
			</div>
			<div class="inputBox">
				<input type="email" name="email" required="required" autocomplete="off">
				<i class="bi bi-envelope-fill"></i>
				<span>Email</span>
			</div>
			<div class="inputBox">
				<input type="password" autocomplete="off" name="mot_de_passe" required="required" title="Your password must have at least 4 caracters...">
				<i class="bi bi-lock-fill"></i>
				<span>Create password</span>
			</div>
			<div class="inputBox">
				<input type="submit" value="Create Account">
			</div>
			<p>Already a formative ? <a href="#" class="login">Log in</a></p>

			<?php

				if (isset($validationErrors) && !empty($validationErrors)) {
					foreach ($validationErrors as $error) {
						echo '<div class="alert alert-danger">' . $error . '</div>';
					}
				}


				if (isset($success_msg) && !empty($success_msg)) {
					echo '<div class="alert alert-success">' . $success_msg . '</div>';

					header('refresh:5;url=login.php');
				}

			?>

		</div>


		<!-- <div class="form signin"> -->
			<!-- <h2>Sign In</h2> -->
			<!-- <div class="inputBox"> -->
				<!-- <input type="text" required="required"> -->
				<!-- <i class="bx bx--user"></i> -->
				<!-- <span>username</span> -->
			<!-- </div> -->
			<!-- <div class="inputBox"> -->
				<!-- <input type="password" required="required"> -->
				<!-- <i class="bx bx--lock"></i> -->
				<!-- <span>password</span> -->
			<!-- </div> -->
			<!-- <div class="inputBox"> -->
				<!-- <input type="submit" value="Login"> -->
			<!-- </div> -->
			<!-- <p>Not Registered ? <a href="#" class="create"> Create an account</a>				</p> --> 
		<!-- </div> -->

	</div>
	</form>

	<script>
		/*let login = document.querySelector('.login');
		let create = document.querySelector('.create');
		let container = document.querySelector('.container');

		login.onclick = function(){
			container.classList.add('signinForm');
		}
		
		create.onclick = function(){
			container.classList.remove('signinForm');
		}*/
	</script>
</body>
</html>
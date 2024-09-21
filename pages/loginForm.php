<?php

    require("connexiondb.php");

$requete=$conn->prepare("SELECT * FROM Administrateur");
$requete->execute();
$resultat = $requete->fetch();

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Se connecter</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/monstyle.css">

        <link rel="shortcut icon" href="../images/favicon.svg" type="image/x-icon">
        <link rel="shortcut icon" href="../images/favicon.png" type="image/png">
		<style>
			body{
				background-color: #eeebeb;
			}
		</style>
	</head>
	<body>		
		<br><br><br><br>
		<div class="container col-md-4 col-md-offset-4">			
			<div class="panel panel-primary">
				<div class="panel-heading">LOGIN CONSULTANTS</div>
				<div class="panel-body">
					<form method="post" action="connecterForm.php" class="form">
									
						<div class="form-group">
							<label for="denomination" class="control-label">DENOMINATION</label>
							<input type="text" name="denomination" autocomplete="off" id="denomination" class="form-control"/>
						</div>

						<div class="form-group">
							<label for="email" class="control-label">EMAIL</label>
							<input type="email" name="email" autocomplete="off" id="email" class="form-control"/>
						</div>
						
						<div class="form-group">
							<label for="mot_de_passe" class="control-label">PASSWORD</label>
							<input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control"/>
						</div>
							
						<button type="submit" class="btn btn-primary btn-block">Login As Cosnultant</button>
						<br>

						<a href="mailto:<?php echo ' '.$resultat['email']?>">Create an Account</a>
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<a href="mailto:<?php echo ' '.$resultat['email']?>">Password Forgotten</a>
						
					</form>
				</div>
			</div>			
		</div>
	</body>
</html>




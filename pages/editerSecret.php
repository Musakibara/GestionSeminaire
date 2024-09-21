<?php 
	require_once("identifier.php");
    require_once("connexiondb.php");
    require_once("../fonctions/fonctionSecret.php");

?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Update Secretary</title>
		<link rel="shortcut icon" href="../images/favicon.svg" type="image/x-icon">
		<link rel="shortcut icon" href="../images/favicon.png" type="image/png">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/MonStyle.css">

		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
		<link rel="stylesheet" href="../CSS/bootstrap.min.css">
	</head>
	<body>
	<?php include("menu2.php"); ?>		
		<br><br><br><br>
		<div class="container col-md-4 col-md-offset-4">			
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Edit Informations</div>
				<div class="panel-body">
				<?php
					if(isset($_GET['idSecretaire']))
					{
						$idSecretaire=$_GET['idSecretaire'];
						$fetch_data = $conn->prepare("SELECT * FROM Secretaire WHERE idSecretaire = '$idSecretaire'");
						$fetch_data->execute(array());
						if($fetch_data->rowCount() > 0)
						{
							foreach($fetch_data as $row)
							{
								?>
								<form method="post" action="updateSecret.php" class="form">
									<input type="hidden" class="form-control" name="idSecretaire" value="<?php echo $row['idSecretaire']?>">
				
									<div class="form-group">
										<label for="nomSecret" class="control-label">NAME</label>
										<input type="text" name="nomSecret" autocomplete="off" id="nomSecret" class="form-control" value="<?php echo $row['nomSecret']; ?>" autocomplete="off"/>
									</div>

									<div class="form-group">
										<label for="email" class="control-label">EMAIL</label>
										<input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" autocomplete="off"/>
									</div>

									<button type="submit" name="update_btn" class="btn btn-primary btn-block">Update</button>
									<br>

									<!-- <a href="page_add_utilisateur.php">Créer mon compte</a> -->
									<!-- &nbsp&nbsp&nbsp&nbsp&nbsp -->
									<!-- <a href="page_demande_pwd.php">Mot de passe oublié</a> -->
									<!--  -->
								<!-- </form> -->
								<!-- <form action="updateSecret.php" method="POST" > -->
									<!-- <input type="hidden" class="form-control" name="idSecretaire" value=""> -->
								<!-- <div class="mb-3"> -->
									<!-- <label for="exampleInputEmail1" class="form-label">Name</label> -->
									<!-- <input type="text" class="form-control" name="nomSecret" value="" 	autocomplete="off" > -->
								<!-- </div> -->
								<!-- <div class="mb-3"> -->
									<!-- <label for="exampleInputEmail1" class="form-label">Email</label> -->
									<!-- <input type="email" class="form-control" name="email" value="" autocomplete="off" > -->
								<!-- </div> -->
								<!-- <div class="mb-5"> -->
									<!-- <button type="submit" name="update_btn" class="btn btn-info"> Update </button> -->
								<!-- </div> -->
								<!-- </form> -->
								<?php
							}
						}
					}
					else
					{
					    $msg= "Something went wrong";
					    $url="secretaire.php";		
					    header("location:message.php?msg=$msg&color=r&url=$url");
					}
				?>
				</div>
			</div>			
		</div>
	</body>
</html>

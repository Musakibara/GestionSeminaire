<?php 
	require_once("identifier.php");
    require_once("connexiondb.php");
    require_once("../fonctions/fonctionParti.php");

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
	<?php include("menu3.php"); ?>		
		<br><br><br><br>
		<div class="container col-md-4 col-md-offset-4">			
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Edit Informations</div>
				<div class="panel-body">
				<?php
					if(isset($_GET['idParticipant']))
					{
						$id=$_GET['idParticipant'];
						$fetch_data = $conn->prepare("SELECT * FROM Participant WHERE idParticipant = '$id'");
						$fetch_data->execute(array());
						if($fetch_data->rowCount() > 0)
						{
							foreach($fetch_data as $row)
							{
								?>
								<form method="post" action="updateParti.php" class="form">
									<input type="hidden" class="form-control" name="idParticipant" value="<?php echo $row['idParticipant']?>">
				
									<div class="form-group">
										<label for="nomParti" class="control-label">NAME</label>
										<input type="text" name="nomParti" autocomplete="off" id="nomParti" class="form-control" value="<?php echo $row['nomParti']; ?>" autocomplete="off"/>
									</div>
									<div class="form-group">
										<label for="email" class="control-label">EMAIL</label>
										<input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" autocomplete="off"/>
									</div>
									<div class="form-group">
										<label for="numTel" class="control-label">PHONE</label>
										<input type="number" name="numTel" id="numTel" class="form-control" value="<?php echo $row['numTel']; ?>" autocomplete="off"/>
									</div>
									<div class="form-group">
										<label for="nomStructure" class="control-label">STRUCTURE</label>
										<input type="text" name="nomStructure" id="nomStructure" class="form-control" value="<?php echo $row['nomStructure']; ?>" autocomplete="off"/>
									</div>
									

									<button type="submit" name="update_btn" class="btn btn-primary btn-block">Update</button>
									<br>

									<!-- <a href="page_add_utilisateur.php">Créer mon compte</a> -->
									<!-- &nbsp&nbsp&nbsp&nbsp&nbsp -->
									<!-- <a href="page_demande_pwd.php">Mot de passe oublié</a> -->
									<!--  -->
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

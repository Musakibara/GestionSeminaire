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
	<?php include("menu4.php"); ?>		
		<br><br><br><br>
		<div class="container col-md-4 col-md-offset-4">			
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Edit Informations</div>
				<div class="panel-body">
				<?php
					if(isset($_GET['idConsultant']))
					{
						$id=$_GET['idConsultant'];
						$fetch_data = $conn->prepare("SELECT * FROM Consultant WHERE idConsultant = '$id'");
						$fetch_data->execute(array());
						if($fetch_data->rowCount() > 0)
						{
							foreach($fetch_data as $row)
							{
								?>
								<form method="post" action="updateForm.php" class="form">
									<input type="hidden" class="form-control" name="idConsultant" value="<?php echo $row['idConsultant']?>">
				
									<div class="form-group">
										<label for="denomination" class="control-label">DENOMINATION</label>
										<input type="text" name="denomination" autocomplete="off" id="denomination" class="form-control" value="<?php echo $row['denomination']; ?>" autocomplete="off"/>
									</div>
									<div class="form-group">
										<label for="formateur1" class="control-label">FORMATEUR1</label>
										<input type="text" name="formateur1" id="formateur1" class="form-control" value="<?php echo $row['formateur1']; ?>" autocomplete="off"/>
									</div>
									<div class="form-group">
										<label for="formateur2" class="control-label">FORMATEUR2</label>
										<input type="text" name="formateur2" id="formateur2" class="form-control" value="<?php echo $row['formateur2']; ?>" autocomplete="off"/>
									</div>
                                    <div class="form-group">
                                    	<label for="formateur3" class="control-label">FORMATEUR3</label>
                                    	<input type="text" name="formateur3" id="formateur3" class="form-control" value="<?php echo $row['formateur3']; ?>" autocomplete="off"/>
                                    </div>
                                    <div class="form-group">
                                    	<label for="email" class="control-label">EMAIL</label>
                                    	<input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" autocomplete="off"/>
                                    </div>
                                    <div class="form-group">
                                    	<label for="numTel" class="control-label">NUMERO</label>
                                    	<input type="number" name="numTel" id="numTel" class="form-control" value="<?php echo $row['numTel']; ?>" autocomplete="off"/>
                                    </div>
                                    <div class="form-group">
                                    	<label for="NIU" class="control-label">NIU</label>
                                    	<input type="number" name="NIU" id="NIU" class="form-control" value="<?php echo $row['NIU']; ?>" autocomplete="off"/>
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

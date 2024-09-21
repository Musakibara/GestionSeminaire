<?php 
	require_once("identifier.php");
    require_once("connexiondb.php");
    require_once("../fonctions/fonctionAdmin.php");

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
					if(isset($_GET['idAdministrateur']))
					{
						$idAdmin=$_GET['idAdministrateur'];
						$fetch_data = $conn->prepare("SELECT * FROM Administrateur WHERE idAdministrateur = '$idAdmin'");
						$fetch_data->execute(array());
						if($fetch_data->rowCount() > 0)
						{
							foreach($fetch_data as $row)
							{
								?>
								<form method="post" action="updateAdmin.php" class="form">
									<input type="hidden" class="form-control" name="idAdministrateur" value="<?php echo $row['idAdministrateur']?>">
				
									<div class="form-group">
										<label for="nom" class="control-label">NAME</label>
										<input type="text" name="nom" autocomplete="off" id="nom" class="form-control" value="<?php echo $row['nom']; ?>" autocomplete="off"/>
									</div>

									<div class="form-group">
										<label for="email" class="control-label">EMAIL</label>
										<input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" autocomplete="off"/>
									</div>
                                    <div class="form-group">
                                    	<label for="mot_de_passe" class="control-label">PASSWORD</label>
                                    	<input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control" value="<?php echo $row['mot_de_passe']; ?>" autocomplete="off"/>
                                    </div>

									<button type="submit" name="update_btn" class="btn btn-primary btn-block">Update</button>
									<br>

								<?php
							}
						}
					}
					else
					{
					    $msg= "Something went wrong";
					    $url="Admin.php";		
					    header("location:message.php?msg=$msg&color=r&url=$url");
					}
				?>
				</div>
			</div>			
		</div>
	</body>
</html>

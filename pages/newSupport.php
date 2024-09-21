<?php 
	require_once("identifierForm.php");
    require_once("connexiondb.php");

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
        <style>
			body{
				background-color: #eeebeb;
			}
		</style>

	</head>
	<body>
	<?php include("menu1Form.php"); ?>		
		<br><br><br><br>
		<div class="container col-md-4 col-md-offset-4">			
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Upload Course Support</div>
				<div class="panel-body">
				<?php
					if(isset($_GET['idSeminaire']))
					{
						$id=$_GET['idSeminaire'];
						$fetch_data = $conn->prepare("SELECT * FROM Seminaire WHERE idSeminaire = '$id'");
						$fetch_data->execute(array());
						if($fetch_data->rowCount() > 0)
						{
							foreach($fetch_data as $row)
							{
								?>				
									
								<form method="post" action="uploadSupport.php" class="form" enctype="multipart/form-data">
									<input type="hidden" class="form-control" name="idSeminaire" value="<?php echo $row['idSeminaire']?>">
									<div class="form-group">
										<label for="supportCours" class="control-label">UPLOAD COURSE</label>
										<input type="file" name="supportCours" autocomplete="off" id="supportCours" class="form-control" autocomplete="off"/>
									</div>
									<button type="submit" name="update_btn" class="btn btn-primary btn-block">Upload</button>
								</form>

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

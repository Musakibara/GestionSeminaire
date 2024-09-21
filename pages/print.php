<?php
    include("identifier.php");
	include("connexiondb.php");
	
	if(isset($_GET['idSeminaire']))
		$ids=$_GET['idSeminaire'];
	else
		$ids=0;
	
    $req = $conn ->prepare("SELECT programme FROM Seminaire WHERE idSeminaire=$ids");
    $data = $req->fetch()
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> Les Documents du Seminaire </title> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- icone au navigateur -->
        <link rel="shortcut icon" href="../images/favicon.svg" type="image/x-icon">
        <link rel="shortcut icon" href="../images/favicon.png" type="image/png">
		<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.css">
	</head>				
	<body>
        <?php require_once('menu1.php'); ?>
		<br><br><br><br>
		<div class="container col-md-6 col-md-offset-3">
			<h2>Séléctionner le document à imprimer</h2>
            <br>
			<div class="panel panel-primary">
				<div class="panel-body text-center">
					
					<a class="btn btn-primary" 	href="programme.php?idSeminaire=<?php echo $ids ?>">
                        Programme du Seminaire
                    </a>
					
					<a class="btn btn-success" href="listParti.php?idSeminaire=<?php echo $ids ?>">
						Liste des Participants
                    </a>

					<a class="btn btn-primary" href="listKit.php?idSeminaire=<?php echo $ids ?>">
                        Liste des Kits
                    </a>

                    <a class="btn btn-success" href="rapport.php?idSeminaire=<?php echo $ids ?>">
                        Rapport final
                    </a>
				
				</div>
			</div>			
		</div>
	</body>	
</html>

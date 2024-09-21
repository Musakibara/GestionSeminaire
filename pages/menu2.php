<?php
    //require_once('identifier.php');
	require_once('connexiondb.php');
	$requete=$conn->prepare("SELECT * FROM Administrateur");
	$requete->execute();
	$resultat = $requete->fetch();
?>

<nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="container-fluid">
	
		<ul class="nav navbar-nav">

			<li><a href="Admin">
 				<i class="bi bi-arrow-left-circle-fill"></i>
				&nbsp Return
				</a>
			</li>
				
		</ul>
		

		<ul class="nav navbar-nav navbar-right">

			<li>
				<a href="editerAdmin?idAdministrateur=<?php echo $resultat ['idAdministrateur'] ?>">
					<i class="bi bi-person-circle"></i>
					<?php echo  ' '.$resultat['nom']?>
				</a> 
			</li>
							
		</ul>
		
	</div>
</nav>

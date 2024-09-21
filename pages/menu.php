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

			<li><a href="seminaire">
       		 	<i class="bi bi-person-vcard-fill"></i>
       			&nbsp Seminaires
    			</a>
			</li>

			<li><a href="consultant">
        		<i class="bi bi-mortarboard-fill"></i>
        		&nbsp Consultants
    			</a>
			</li>
		
					
			<li><a href="participant">
                    <i class="bi bi-people-fill"></i>
                    &nbsp Participants
                </a>
            </li>
				
		</ul>
		

		<ul class="nav navbar-nav navbar-right">


			<li>
				<a href="editerAdmin?id=<?php echo $resultat ['idAdministrateur'] ?>">
					<i class="bi bi-person-circle"></i>
					<?php echo  ' '.$resultat['nom']?>
				</a> 
			</li>
			<li>
				<a href="logoutParti">
                    <i class="bi bi-box-arrow-right"></i>
					&nbsp Logout
				</a>
			</li>
							
		</ul>
		
	</div>
</nav>

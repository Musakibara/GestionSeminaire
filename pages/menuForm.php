<?php
    //require_once('identifier.php');
	require_once('connexiondb.php');
	
	
?>
<nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="container-fluid">
	
		<ul class="nav navbar-nav">

			<li><a href="#">
 				<i class="bi bi-arrow-left-circle-fill"></i>
				&nbsp Gestion des Consultants
				</a>
			</li>

			<li><a href="seminaireForm">
       		 	<i class="bi bi-person-vcard-fill"></i>
       			&nbsp Seminaires
    			</a>
			</li>

			<li><a href="consultantForm">
        		<i class="bi bi-mortarboard-fill"></i>
        		&nbsp Consultants
    			</a>
			</li>
		
					
			<li><a href="participantForm.php">
                    <i class="bi bi-people-fill"></i>
                    &nbsp Participants
                </a>
            </li>
				
		</ul>
		

		<ul class="nav navbar-nav navbar-right">

			<li>
				<a href="#">
					<i class="bi bi-person-circle"></i>
					<?php echo  ' '.$_SESSION['denomination']?>
				</a> 
			</li>
			<li>
				<a href="logoutForm">
                    <i class="bi bi-box-arrow-right"></i>
					&nbsp Logout
				</a>
			</li>
							
		</ul>
		
	</div>
</nav>

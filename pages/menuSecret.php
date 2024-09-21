<?php
    //require_once('identifier.php');
	require_once('connexiondb.php');
	
?>

<nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="container-fluid">
	
		<ul class="nav navbar-nav">

			<li><a href="Secretary">
 				<i class="bi bi-arrow-left-circle-fill"></i>
				&nbsp Return
				</a>
			</li>
				
		</ul>
		

		<ul class="nav navbar-nav navbar-right">

			<li>
				<a href="#">
					<i class="bi bi-person-circle"></i>
					<?php echo  ' '.$_SESSION['nomSecret']?>
				</a> 
			</li>
							
		</ul>
		
	</div>
</nav>

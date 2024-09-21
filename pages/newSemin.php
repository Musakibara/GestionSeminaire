<?php
	require_once('connexiondb.php');
	require_once('identifier.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New Seminary</title>

	<link rel="shortcut icon" href="../images/favicon.svg" type="image/x-icon">
 	<link rel="shortcut icon" href="../images/favicon.png" type="image/png">
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="boxicons.min.css">
	<link rel="stylesheet" href="../CSS/styleFormuler.css">

	<script src="../js/jquery-1.10.2.js"></script>
	<script src="../js/jquery-ui-1.10.4.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/school.js"></script>
	<script src="../js/jquery-ui-i18n.min.js"></script>
	<script>
   		$(function () {
    	    // définit les options par défaut du calendrier
    	    $.datepicker.setDefaults({
    	        showButtonPanel: true,// affiche des boutons sous le calendrier
    	        showOtherMonths: true, // affiche les autres mois
    	        selectOtherMonths: true // possibilités de sélectionner les jours des autres mois
    	    });
    	    //$("#calendar").datepicker(); // affiche le calendrier par défaut
    	    //$("#calendar").datepicker($.datepicker.regional["fr"]); // affiche le calendrier en fr
    	    $("#calendar").datepicker({
    	        dateFormat: "yy-mm-dd",
    	    });
    	    $("#calendar1").datepicker({
    	        dateFormat: "yy-mm-dd",
    	    });
    	});
	</script>

</head>
<body>
	<form action="insertSemin.php" method="post" enctype="multipart/form-data">
	<div class="container">
		<div class="form signup">
			<h2>Add Seminary</h2>
			<div class="inputBox">
				<input type="text" required="required" name="nomSemin" autocomplete="off">
				<i class="bi bi-person-vcard-fill"></i>
				<span>Name Seminary</span>
			</div>
			<div class="inputBox">
				<input type="datetime-local" required="required" name="date" autocomplete="off">
				<i class="bi bi-calendar-date-fill"></i>
				<span>Date</span>
			</div>
			<div class="inputBox">
				<input type="text" required="required" name="lieu" autocomplete="off">
				<i class="bi bi-geo-alt-fill"></i>
				<span>Location</span>
			</div>
			<div class="inputBox">
				<input type="text" required="required" name="duree" autocomplete="off">
				<i class="bi bi-calendar-day-fill"></i>
				<span>Duration</span>
			</div>
			<div class="inputBox">
				<!-- <label for="file" class="couleur">Participant List :</label> -->
				<input type="file" name="listPart" accept="application/pdf">
				<i class="bi bi-people-fill"></i>
				<span>List Participants</span>
			</div>
            <div class="inputBox">
				<!-- <label for="kit" class="couleur">List Kits :</label> -->
				<input type="file" name="kit" accept="application/pdf">
				<i class="bi bi-people-fill"></i>
				<span>List Kits</span>
			</div>
            <div class="inputBox">
				<!-- <label for="programme" class="couleur">Programme :</label> -->
				<input type="file" name="programme" accept="application/pdf">
				<i class="bi bi-people-fill"></i>
				<span>Programme</span>
			</div>
			<div class="inputBox">
				<input type="submit" value="Create Account">
			</div>
			<p>Already Exist ? <a href="seminaire.php" class="login"> Cancel</a></p>
		</div>
	</div>
	</form>
</body>
</html>
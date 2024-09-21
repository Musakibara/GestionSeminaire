
<?php
    require_once('connexiondb.php');
    require('identifierParti.php');
    require_once('../fonctions/fonctionParti.php');

    $requete=$conn->prepare("SELECT * FROM Participant");
    $requete->execute();
    $resultat = $requete->fetch();

    $r1 = getEffectifParti();
    $r2 = getEffectifConsul();
    $r4 = getEffectifSemin();
    
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Participant_Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="../CSS/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../CSS/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../CSS/monStyle.css">
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <link rel="shortcut icon" href="../images/logoCsnadi-removebg-preview.png" type="image/x-icon">
    <!-- <link rel="shortcut icon" href="../images/favicon.svg" type="image/x-icon"> -->
    <!-- <link rel="shortcut icon" href="../images/favicon.png" type="image/png"> -->
    <style>
			body{
				background-color: #eeebeb;
			}
		</style>

</head>
<body>
<?php include('menuParti.php'); ?>
<br><br><br><br>
<div class="container  tableau-stat text-center">
    <h1 class="text-center text-primary"><i>STATISTIQUES DE BASE POUR  <b><?php echo ' '. $_SESSION['nomParti'] ?></b></i></h1>
    <br><br>
    <div class="row">
    
        <!-- ************ Total des Participants ******************  -->

        <div class="col-md-4">
            <div class="stat stat12">
                <span class="bi bi-person-fill"></span>
                <div class="effectif">
                    Effectif Participants 
                    <div class="nbr"><?php echo $r1 ?></div>
                </div>

            </div>
        </div>

        <!-- ************* Total des Seminaire atteint  *****************  -->

        <div class="col-md-4">
            <div class="stat stat1">
                <span class="bi bi-person-vcard-fill"></span>
                <div class="effectif">
                    Effectif Seminaires
                    <div class="nbr"><?php echo $r4 ?> </div>
                </div>
            </div>
        </div>

        <!-- ************* Total des inscrits en 2ème année *****************  -->


        <div class="col-md-4">
            <div class="stat stat2">
                <span class="bi bi-mortarboard-fill"></span>
                <div class="effectif">
                    Effectif Consultants
                    <div class="nbr"><?php echo $r2 ?> </div>
                </div>
            </div>
        </div>


    </div>
</div>

</body>
</html>

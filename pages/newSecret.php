
<?php 
	require_once("identifier.php");
    require_once("connexiondb.php");
    require_once("../fonctions/fonctionSecret.php");

	//echo 'Nombre des  user1 :  '.
	//rechercher_par_login('user1');
	//echo 'Nombre des  user1@gmail.com :  '.
	//rechercher_par_email('user1@gmail.com');
$validationErrors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nomSecret = $_POST['nomSecret'];
    $email = $_POST['email'];
	$mot_de_passe = $_POST['mot_de_passe'];
	$idAdmin=isset($_POST['idAdministrateur'])?$_POST['idAdministrateur']:1;


    if (isset($nomSecret)) {
        $filtredNomSecret = filter_var($nomSecret,FILTER_SANITIZE_STRING);

        if (strlen($filtredNomSecret) < 4) {
            $validationErrors[] = "Erreur!!! Le nom doit contenir au moins 4 caratères";
        }
    }

    if (isset($mot_de_passe)) {

        if (empty($mot_de_passe)) {
            $validationErrors[] = "Erreur!!! Le mot de passe ne doit pas etre vide";
        }

    }

    if (isset($email)) {
        $filtredEmail = filter_var($nomSecret, FILTER_SANITIZE_EMAIL);

        if ($filtredEmail != true) {
            $validationErrors[] = "Erreur!!! Email  non valid";

        }
    }

    if (empty($validationErrors)) {
        if (rechercher_par_nom($nomSecret) == 0 & rechercher_par_email($email) == 0) {
            $requete = $conn->prepare("INSERT INTO Secretaire(nomSecretaire,email,mot_de_passe, idAdministrateur) VALUES (:pnomSecret,:pemail,:pmot_de_passe, :pidAdministrateur)");

            $requete->execute(array('pnomSecret' => $nomSecret,
                'pemail' => $email,
                'pmot_de_passe' => md5($mot_de_passe),
				'pidAdministrateur' => $idAdmin));

            header("location: login.php");
        } else {
            if (rechercher_par_nom($nomSecret) > 0) {
                $validationErrors[] = 'Désolé le nom  exsite deja';
            }
            if (rechercher_par_email($email) > 0) {
                $validationErrors[] = 'Désolé cet email exsite deja';
            }
        }

    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Secretary</title>
    <link rel="shortcut icon" href="../images/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

	<link rel="stylesheet" href="../CSS/styleFormuler.css">
</head>
<body>
<?php //include("menu1.php"); ?>
	<form action="insertSecret.php" method="post">
	<div class="container">
		<div class="form signup">
			<h2>Add Secretary</h2>
			
			<div class="inputBox">
				<input type="text" required="required" name="nomSecret" autocomplete="off" title="Username must have atlest 4 caracters...">
				<i class="bi bi-person-fill"></i>
				<span>Username</span>
			</div>
			<div class="inputBox">
				<input type="email" required="required" name="email" autocomplete="off">
				<i class="bi bi-envelope-fill"></i>
				<span>Email address</span>
			</div>	
			<div class="inputBox">
				<input type="password" required="required" name="mot_de_passe" minlength="5" title="Your password must have atlest 5 caracters..." >
				<i class="bi bi-lock-fill"></i>
				<span>Create password</span>
			</div>
			<div class="inputBox">
				<input type="submit" value="Create Account">
			</div>
			<p>Already a secretary ? <a href="loginSecret.php" class="login">Log in</a></p>
		</div>

	</div>
	</form>

	<script>
		/*let login = document.querySelector('.login');
		let create = document.querySelector('.create');
		let container = document.querySelector('.container');

		login.onclick = function(){
			container.classList.add('signinForm');
		}
		
		create.onclick = function(){
			container.classList.remove('signinForm');
		}*/
	</script>
</body>
</html>
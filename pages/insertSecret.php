<?php
session_start();
    require_once('identifier.php');
    require_once('connexiondb.php');

    $nomSecret=isset($_POST['nomSecret'])?$_POST['nomSecret']:"";
    $email=isset($_POST['email'])?$_POST['email']:"";
    $mot_de_passe=isset($_POST['mot_de_passe'])?$_POST['mot_de_passe']:"";

    $names = $_SESSION['nom'];
    $rq = "select idAdministrateur from Administrateur where nom = '$names'";
    $resultatS=$conn->query($rq); 
    $Admin = $resultatS->fetch();
    $idAdministrateur = $Admin['idAdministrateur'];


    $hashPaswword=password_hash($mot_de_passe, PASSWORD_DEFAULT);

    $idAdministrateur=isset($_POST['idAdministrateur'])?$_POST['idAdministrateur']:1;

    $requete="insert into Secretaire(nomSecret,email,mot_de_passe,idAdministrateur) values(?,?,?,?)";

    $params=array($nomSecret,$email,$hashPaswword,$idAdministrateur);

    $resultat=$conn->prepare($requete);
    
    $resultat->execute($params);

    $msg="Secretaire ajouté avec succès";
    $url="secretaire";
    header("location:message?msg=$msg&color=v&url=$url");
    //header('location:secretaire.php');

?>
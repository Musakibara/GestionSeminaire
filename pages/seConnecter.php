<?php
    session_start();
    require_once('connexiondb.php');
    
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    
    $mot_de_passe=isset($_POST['mot_de_passe'])?$_POST['mot_de_passe']:"";

    $requete=$conn->prepare("SELECT nom, mot_de_passe FROM Administrateur WHERE nom = :nom AND mot_de_passe = :mot_de_passe");

    $requete->bindParam(':nom', $nom);
    $requete->bindParam(':mot_de_passe', $mot_de_passe);

    $requete->execute();

    $resultat = $requete->fetch();


    if($resultat){

        $_SESSION['nom'] = $nom;
        $_SESSION['mot_de_passe'] = $mot_de_passe;
        $_SESSION['logged'] = true;
     
        header('location: Admin');
        exit;
        
    }else{

        $msg="Le nom ou le mot de passe est incorrecte";
        $url="login";
        header("location:message?msg=$msg&color=r&url=$url");
       // $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login 
//ou mot de passe incorrecte!!!";
        //header('location:login.php');
    }

    //  pour proteger contre les injections sur les emails:
     
    //$email = addslashes($email);

?>

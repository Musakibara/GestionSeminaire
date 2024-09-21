<?php
    session_start();
    require_once('connexiondb.php');
    
    $nom=isset($_POST['nomSecret'])?$_POST['nomSecret']:"";
    
    $mot_de_passe=isset($_POST['mot_de_passe'])?$_POST['mot_de_passe']:"";

    $name= strtoupper($nom);

    $requete=$conn->prepare("SELECT * FROM Secretaire WHERE nomSecret = :nomSecret AND mot_de_passe = :mot_de_passe");

    $requete->bindParam(':nomSecret', $name);
    $requete->bindParam(':mot_de_passe', $mot_de_passe);

    $requete->execute();

    $resultat = $requete->fetch();


    if($resultat){

        $_SESSION['nomSecret'] = $name;
        $_SESSION['mot_de_passe'] = $mot_de_passe;
        $_SESSION['logged'] = true;
     
        header('location: secretary');
        exit;
        
    }else{

        $msg="Le nom ou le mot de passe est incorrecte";
        $url="loginSecret";
        header("location:message?msg=$msg&color=r&url=$url");
       // $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login 
//ou mot de passe incorrecte!!!";
        //header('location:login.php');
    }

    //  pour proteger contre les injections sur les emails:
     
    //$email = addslashes($email);

?>

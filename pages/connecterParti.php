<?php
    session_start();
    require_once('connexiondb.php');
    
    $nom=isset($_POST['nomParti'])?$_POST['nomParti']:"";
    
    $mot_de_passe=isset($_POST['mot_de_passe'])?$_POST['mot_de_passe']:"";

    $name= strtoupper($nom);

    $requete=$conn->prepare("SELECT * FROM Participant WHERE nomParti = :nomParti AND mot_de_passe = :mot_de_passe");

    $requete->bindParam(':nomParti', $name);
    $requete->bindParam(':mot_de_passe', $mot_de_passe);

    $requete->execute();

    $resultat = $requete->fetch();

    if($resultat){
       
        if($resultat['etat']==1){

            $_SESSION['nomParti'] = $name;
            $_SESSION['logged'] = true;

            header('location: Participants');
            exit;
            
        }else{

            $msg="<strong>Erreur!! </strong> <b>Votre compte est désactivé.</b> Veuillez contacter l'administrateur";
            $url="loginParti";
            header("location:message?msg=$msg&color=r&url=$url");

        }
    }else{

        $msg="<strong>Erreur!!</strong>Le nom ou le mot de passe est incorrecte";
        $url="loginParti";
        header("location:message?msg=$msg&color=r&url=$url");
    }

    //  pour proteger contre les injections sur les emails:
     
    //$email = addslashes($email);
?>

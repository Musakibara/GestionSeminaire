<?php
    session_start();
    require_once('connexiondb.php');
    
    $emails=isset($_POST['email'])?$_POST['email']:"";

    $denomination=isset($_POST['denomination'])?$_POST['denomination']:"";

    $mot_de_passe=isset($_POST['mot_de_passe'])?$_POST['mot_de_passe']:"";

    $denomination= strtoupper($denomination);

    //pour proteger contre les injections sur les emails:

    $email = addslashes($emails);

    $requete=$conn->prepare("SELECT * FROM Consultant WHERE denomination = :denomination AND email = :email AND mot_de_passe = :mot_de_passe");

    $requete->bindParam(':denomination', $denomination);
    $requete->bindParam(':email', $email);
    $requete->bindParam(':mot_de_passe', $mot_de_passe);

    $requete->execute();

    $resultat = $requete->fetch();

    if($resultat){
       
        if($resultat['etat']==1){

            $_SESSION['denomination'] = $denomination;
            $_SESSION['email'] = $email;
            $_SESSION['logged'] = true;

            header('location: consultants');
            exit;
            
        }else{

            $msg="<strong>Erreur!! </strong> <b>Votre compte est désactivé.</b> Veuillez contacter l'administrateur";
            $url="loginForm";
            header("location:message?msg=$msg&color=r&url=$url");

        }
    }else{

        $msg="<strong>Erreur!!</strong>Le nom ou le mot de passe est incorrecte";
        $url="loginForm";
        header("location:message?msg=$msg&color=r&url=$url");
    }

    //  pour proteger contre les injections sur les emails:
     
    //$email = addslashes($email);
?>        

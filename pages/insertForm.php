<?php
session_start();
    require_once('identifier.php');
    require_once('connexiondb.php');
    require_once('../fonctions/fonctionForm.php');

    
    $typeForm=isset($_POST['typeConsultant'])?$_POST['typeConsultant']:"";
    $denomination=isset($_POST['denomination'])?$_POST['denomination']:"";
    $formateur1=isset($_POST['formateur1'])?$_POST['formateur1']:"";
    $formateur2=isset($_POST['formateur2'])?$_POST['formateur2']:"";
    $formateur3=isset($_POST['formateur3'])?$_POST['formateur3']:"";
    $numTel=isset($_POST['numTel'])?$_POST['numTel']:"";
    $NIU=isset($_POST['NIU'])?$_POST['NIU']:"";
    $email=isset($_POST['email'])?$_POST['email']:"";
    $mot_de_passe=isset($_POST['mot_de_passe'])?$_POST['mot_de_passe']:"";

    $hashPaswword=password_hash($mot_de_passe, PASSWORD_DEFAULT);

    $names = $_SESSION['nom'];
    $rq = "select idAdministrateur from Administrateur where nom = '$names'";
    $resultatS=$conn->query($rq); 
    $Admin = $resultatS->fetch();
    $idAdministrateur = $Admin['idAdministrateur'];



    $nbr_user=rechercher_par_nom($formateur1, $formateur2, $formateur3);

    if($nbr_user==0){

        $requete=$conn->prepare("insert into Consultant(typeConsultant,denomination,formateur1,formateur2,formateur3,numTel,NIU,email,mot_de_passe,idAdministrateur,etat) VALUES(:ptypeConsultant,:pdenomination,:pformateur1,:pformateur2,:pformateur3,:pnumTel,:pNIU,:pemail,:pmot_de_passe,:pidAdministrateur,:petat)");

        $requete->execute(array(

            'ptypeConsultant' => $typeForm,
            'pdenomination' => $denomination,
            'pformateur1' => $formateur1,
            'pformateur2' => $formateur2,
            'pformateur3' => $formateur3,
            'pnumTel' =>$numTel,
            'pNIU' =>$NIU,
            'pemail' =>$email,
            'pmot_de_passe' =>$hashPaswword,
            'pidAdministrateur' =>$idAdministrateur,
            'petat' => 1
        ));

        

        $msg="Consultant ajouté avec succès et temporairement actif jusqu'a desactivation par l'administrateur";
        $url="consultant";
        header("location:message?msg=$msg&color=v&url=$url");
        //header('location:secretaire.php');

    }else{
        $msg= "Le nom est déja utilisé par un autre Consultant";
        $url="consultant";		
        header("location:message?msg=$msg&color=r&url=$url");
     }

?>
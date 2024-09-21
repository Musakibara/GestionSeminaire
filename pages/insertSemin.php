<?php
session_start();
    require_once('identifier.php');
    require_once('connexiondb.php');
    

    $nomSemin=$_POST['nomSemin'];
    $date=$_POST['date'];
    $lieu=$_POST['lieu'];
    $dure=$_POST['duree'];
    
    $names = $_SESSION['nom'];
    $rq = "select idAdministrateur from Administrateur where nom = '$names'";
    $resultatS=$conn->query($rq); 
    $Admin = $resultatS->fetch();
    $idAdministrateur = $Admin['idAdministrateur'];

    
    if(isset($_FILES['listPart']) and $_FILES['listPart']['error']==0){

        $Participant="../Documents/ListPartis/";

            $temp_name=$_FILES['listPart']['tmp_name'];
            if(!is_uploaded_file($temp_name)){
                exit;
                $msg="Le fichier est introuvable";
                $url="newSemin.php";
                header("location:message.php?msg=$msg&color=r&url=$url");
            }
            if($_FILES['listPart']['size'] >= 10000000){
                $msg="Erreur, le fichier est trop voluminieux";
                $url="newSemin.php";
                header("location:message.php?msg=$msg&color=r&url=$url");
                exit;
            }
            $infosFichier = pathinfo($_FILES['listPart']['name']);
            $extension_upload = $infosFichier['extension'];
            $extension_upload = strtolower($extension_upload);
            $extension_autorisees = array('pdf');
            if(!in_array($extension_upload, $extension_autorisees)){
                $msg=" Erreur, veuillez inserer un fichier pdf !";
                $url="newSemin.php";
                header("location:message.php?msg=$msg&color=r&url=$url");
                exit;
            }
        
            $nom_parti = $nomSemin."P".".".$extension_upload;
            if(!move_uploaded_file($temp_name, $Participant.$nom_parti)){
                $msg="Probleme lors du televersement des Participants, ressayez";
                $url="newSemin.php";
                header("location:message.php?msg=$msg&color=r&url=$url");
                exit;
            }
            $parti_name = $nom_parti;

    }else{

        $msg="Inserez la listes des Participants";
        $url="newSemin.php";
        header("location:message.php?msg=$msg&color=r&url=$url");
        exit;
    }



    if(isset($_FILES['kit']) and $_FILES['kit']['error']==0){
        $kit="../Documents/ListKits/";
            $temp_name=$_FILES['kit']['tmp_name'];
            if(!is_uploaded_file($temp_name)){
                exit;
                $msg="Le fichier est introuvable";
                $url="newSemin.php";
                header("location:message.php?msg=$msg&color=r&url=$url");
            }
            if($_FILES['kit']['size'] >= 10000000){
                $msg="Erreur, le fichier est trop voluminieux";
                $url="newSemin.php";
                header("location:message.php?msg=$msg&color=r&url=$url");
                exit;
            }
            $infosFichier = pathinfo($_FILES['kit']['name']);
            $extension_upload = $infosFichier['extension'];
            $extension_upload = strtolower($extension_upload);
            $extension_autorisees = array('pdf');
            if(!in_array($extension_upload, $extension_autorisees)){
                $msg=" Erreur, veuillez inserer un fichier pdf !";
                $url="newSemin.php";
                header("location:message.php?msg=$msg&color=r&url=$url");
                exit;
            }
        
            $nom_kit = $nomSemin."K".".".$extension_upload;
            if(!move_uploaded_file($temp_name, $kit.$nom_kit)){
                $msg="Probleme lors du televersement du Kit, ressayez";
                $url="newSemin.php";
                header("location:message.php?msg=$msg&color=r&url=$url");
                exit;
            }
            $kit_name = $nom_kit;
    }else{
        $msg="Inserez la listes des Participants";
        $url="newSemin.php";
        header("location:message.php?msg=$msg&color=r&url=$url");
        exit;
    }

    
    if(isset($_FILES['programme']) and $_FILES['programme']['error']==0){
        $programme="../Documents/programmes/";
            $temp_name=$_FILES['programme']['tmp_name'];
            if(!is_uploaded_file($temp_name)){
                exit;
                $msg="Le fichier est introuvable";
                $url="newSemin.php";
                header("location:message.php?msg=$msg&color=r&url=$url");
            }
            if($_FILES['programme']['size'] >= 10000000){
                $msg="Erreur, le fichier est trop voluminieux";
                $url="newSemin.php";
                header("location:message.php?msg=$msg&color=r&url=$url");
                exit;
            }
            $infosFichier = pathinfo($_FILES['programme']['name']);
            $extension_upload = $infosFichier['extension'];
            $extension_upload = strtolower($extension_upload);
            $extension_autorisees = array('pdf');
            if(!in_array($extension_upload, $extension_autorisees)){
                $msg=" Erreur, veuillez inserer un fichier pdf !";
                $url="newSemin.php";
                header("location:message.php?msg=$msg&color=r&url=$url");
                exit;
            }
        
            $nom_Prog = $nomSemin."Prog".".".$extension_upload;
            if(!move_uploaded_file($temp_name, $programme.$nom_Prog)){
                $msg="Probleme lors du televersement du Programme, ressayez";
                $url="newSemin.php";
                header("location:message.php?msg=$msg&color=r&url=$url");
                exit;
            }
            $prog_name = $nom_Prog;
    }else{
        $msg="Inserez la listes des Participants";
        $url="newSemin.php";
        header("location:message.php?msg=$msg&color=r&url=$url");
        exit;
    }
    

    $requete=$conn->prepare("INSERT INTO Seminaire(nomSemin,date,lieu,duree,listPart,kit,programme,idAdministrateur) VALUES
    (:nomSemin,:date,:lieu,:duree,:listPart,:kit,:programme,:idAdministrateur)");

    $requete->execute(array(
        'nomSemin' => $nomSemin,
        'date' => $date,
        'lieu' => $lieu,
        'duree' => $dure,
        'listPart' => $parti_name,
        'kit' =>$kit_name,
        'programme' =>$prog_name,
        'idAdministrateur' =>$idAdministrateur)
    );

    $msg="Seminaire ajouté avec succès par l'administrateur";
    $url="seminaire";
    header("location:message?msg=$msg&color=v&url=$url");


?>
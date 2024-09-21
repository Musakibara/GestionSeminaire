<?php
session_start();
    require_once('identifier.php');
    require_once('connexiondb.php');
    require_once('../fonctions/fonctionParti.php');

    $nomParti=$_POST['nomParti'];
    $email=$_POST['email'];
    $numTel=$_POST['numTel'];
    $nomStructure=$_POST['nomStructure'];
    $mot_de_passe=$_POST['mot_de_passe'];

    $names = $_SESSION['nom'];
    $rq = "select idAdministrateur from Administrateur where nom = '$names'";
    $resultatS=$conn->query($rq); 
    $Admin = $resultatS->fetch();
    $idAdministrateur = $Admin['idAdministrateur'];


    if(isset($_FILES['photo']) and $_FILES['photo']['error']==0){

        $dossier='../Documents/photo/';
        $temp_name=$_FILES['photo']['tmp_name'];
        if(!is_uploaded_file($temp_name)){
            exit;
            $msg="Le fichier est introuvable";
            $url="newParti.php";
            header("location:message.php?msg=$msg&  color=r&url=$url");
        }
        if($_FILES['photo']['size'] >= 1000000){
            $msg="Erreur, le fichier est trop voluminieux";
            $url="newParti.php";
            header("location:message.php?msg=$msg&color=r&url=$url");
            exit;
        }

        $infosFichier = pathinfo($_FILES['photo']['name']);
        $extension_upload = $infosFichier['extension'];

        $extension_upload = strtolower($extension_upload);
        $extension_autorisees = array('png', 'jpeg','jpg');
        if(!in_array($extension_upload, $extension_autorisees)){
            $msg=" Erreur, veuillez inserer une image (Extension autorisees : png, jpeg, jpg)";
            $url="newParti.php";
            header("location:message.php?msg=$msg&color=r&url=$url");
            exit;
        }
        $nom_photo = $nomParti.".".$extension_upload;
        if(!move_uploaded_file($temp_name, $dossier.$nom_photo)){
            $msg="Probleme lors du televersement de l'image, ressayez";
            $url="newParti.php";
            header("location:message.php?msg=$msg&color=r&url=$url");
            exit;
        }
        $ph_name = $nom_photo;
    }else{
        $ph_name = "inconnu.jpg";
    }

    $hashPaswword=password_hash($mot_de_passe, PASSWORD_DEFAULT);

    $nbr_user=rechercher_par_nom($nomParti);
    $nbr_email=rechercher_par_email($email);

    if($nbr_user==0 and $nbr_email==0){

        $requete=$conn->prepare("INSERT INTO Participant(nomParti,email,numTel,nomStructure,mot_de_passe,photo,idAdministrateur,etat) VALUES(:nomParti,:email,:numTel,:nomStructure,:mot_de_passe,:photo,:idAdministrateur,:etat)");
        
        $requete->execute(array(
            'nomParti' => $nomParti,
            'email' => $email,
            'numTel' =>$numTel,
            'nomStructure' =>$nomStructure,
            'mot_de_passe' =>$hashPaswword,
            'photo' => $ph_name,
            'idAdministrateur' =>$idAdministrateur,
            'etat' => 1));

        $msg="Participant ajouté avec succès et temporairement actif jusqu'a desactivation par l'administrateur";
        $url="Participant";
        header("location:message?msg=$msg&color=v&url=$url");
    }else{
        $msg= "Le nom ou l'email est déja utilisé par un autre Participant";
        $url="participant";		
        header("location:message?msg=$msg&color=r&url=$url");
    }

?>
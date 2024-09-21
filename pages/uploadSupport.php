<?php 
    session_start();
	require('connexiondb.php');

    if(isset($_POST['update_btn'])){

        $names = $_SESSION['denomination'];
        $rq = "select idConsultant from Consultant where denomination = '$names'";
        $resultatS=$conn->query($rq); 
        $consultants = $resultatS->fetch();

        $idConsul = $consultants['idConsultant'];

        $id = $_POST['idSeminaire']; 
            
    if(isset($_FILES['supportCours']) and $_FILES['supportCours']['error']==0){
        $support="../Documents/Cours/";
        $temp_name=$_FILES['supportCours']['tmp_name'];
        if(!is_uploaded_file($temp_name)){
            $msg="Le fichier est introuvable";
            $url="newSupport";
            header("location:message.php?msg=$msg&color=r&url=$url");
            exit;
        }
        if($_FILES['supportCours']['size'] >= 10000000){
            $msg="Erreur, le fichier est trop voluminieux";
            $url="newSupport";
            header("location:message.php?msg=$msg&color=r&url=$url");
            exit;
        }
        $infosFichier = pathinfo($_FILES['supportCours']['name']);
        $extension_upload = $infosFichier['extension'];
        $extension_upload = strtolower($extension_upload);
        $extension_autorisees = array('pdf');
        if(!in_array($extension_upload, $extension_autorisees)){
            $msg=" Erreur, veuillez inserer un fichier pdf !";
            $url="newSupport";
            header("location:message.php?msg=$msg&color=r&url=$url");
            exit;
        }
    
        $nom_Support ="supportCours". $id .".".$extension_upload;
        if(!move_uploaded_file($temp_name, $support.$nom_Support)){
            $msg="Probleme lors du televersement du Support, ressayez";
            $url="newSupport";
            header("location:message.php?msg=$msg&color=r&url=$url");
            exit;
        }
        $sup_name = $nom_Support;
    }else{
        $msg="Inserez le Support de Cours";
        $url="newSupport";
        header("location:message.php?msg=$msg&color=r&url=$url");
        exit;
    }
    

        $update = $conn->prepare("UPDATE Seminaire SET supportCours = '$sup_name' WHERE idSeminaire = '$id'");
        $resultat = $update->execute();

        if($resultat){
            $msg="Support de Cours ajoute avec succèes";
            $url="seminaireForm";
            header("location:message?msg=$msg&color=v&url=$url");
        }else{
            $msg= "No Seminary found";
            $url="seminaireForm";		
            header("location:message?msg=$msg&color=r&url=$url");
        }
    }
		
?>
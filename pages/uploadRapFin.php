
<?php 
    session_start();
	require('connexiondb.php');

    if(isset($_POST['update_btn'])){

        $names = $_SESSION['nomSecret'];
        $rq = "select idSecretaire from Secretaire where nomSecret = '$names'";
        $resultatS=$conn->query($rq); 
        $secretaires = $resultatS->fetch();

        $idSecret = $secretaires['idSecretaire'];

        $id = $_POST['idSeminaire']; 
            
    if(isset($_FILES['rapport']) and $_FILES['rapport']['error']==0){
        $rapport="../Documents/Cours/";
        $temp_name=$_FILES['rapport']['tmp_name'];
        if(!is_uploaded_file($temp_name)){
            $msg="Le fichier est introuvable";
            $url="newRapportFin";
            header("location:message.php?msg=$msg&color=r&url=$url");
            exit;
        }
        if($_FILES['rapport']['size'] >= 10000000){
            $msg="Erreur, le fichier est trop voluminieux";
            $url="newRapportFin";
            header("location:message.php?msg=$msg&color=r&url=$url");
            exit;
        }
        $infosFichier = pathinfo($_FILES['rapport']['name']);
        $extension_upload = $infosFichier['extension'];
        $extension_upload = strtolower($extension_upload);
        $extension_autorisees = array('pdf');
        if(!in_array($extension_upload, $extension_autorisees)){
            $msg=" Erreur, veuillez inserer un fichier pdf !";
            $url="newRapportFin";
            header("location:message.php?msg=$msg&color=r&url=$url");
            exit;
        }
    
        $nom_rapport ="rapport". $id .".".$extension_upload;
        if(!move_uploaded_file($temp_name, $rapport.$nom_rapport)){
            $msg="Probleme lors du televersement du Rapport, ressayez";
            $url="newRapportFin";
            header("location:message.php?msg=$msg&color=r&url=$url");
            exit;
        }
        $rap_name = $nom_rapport;
    }else{
        $msg="Inserez le Rapport de Seminiare";
        $url="newRapportFin";
        header("location:message.php?msg=$msg&color=r&url=$url");
        exit;
    }
    

        $update = $conn->prepare("UPDATE Seminaire SET rapport = '$rap_name', idSecretaire = '$idSecret' WHERE idSeminaire = '$id'");
        $resultat = $update->execute();

        if($resultat){
            $msg="Rapport ajoute avec succèes";
            $url="seminaireSecret";
            header("location:message?msg=$msg&color=v&url=$url");
        }else{
            $msg= "No Seminary found";
            $url="seminaireSecret";		
            header("location:message?msg=$msg&color=r&url=$url");
        }
    }
		
?>
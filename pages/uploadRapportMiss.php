<?php 
    session_start();
	require('connexiondb.php');

    if(isset($_POST['update_btn'])){

        $names = $_SESSION['nomParti'];
        $rqt = "select idParticipant from Participant where nomParti = '$names'";
        $resultat=$conn->query($rqt); 
        $Parti = $resultat->fetch();

        $idParti = $Parti['idParticipant'];

        $id = $_POST['idSeminaire']; 
        $rq = "select lieu, date, duree from Seminaire where idSeminaire = '$id'";
        $resultatS=$conn->query($rq); 
        $Semin = $resultatS->fetch();

        $lieu = $Semin['lieu'];
        $date = $Semin['date'];
        $dure = $Semin['duree'];
            
    if(isset($_FILES['rapport']) and $_FILES['rapport']['error']==0){
        $rapport="../Documents/rapportMiss/";
        $temp_name=$_FILES['rapport']['tmp_name'];
        if(!is_uploaded_file($temp_name)){
            $msg="Le fichier est introuvable";
            $url="newRapportMiss";
            header("location:message.php?msg=$msg&color=r&url=$url");
            exit;
        }
        if($_FILES['rapport']['size'] >= 10000000){
            $msg="Erreur, le fichier est trop voluminieux";
            $url="newRapportMiss";
            header("location:message.php?msg=$msg&color=r&url=$url");
            exit;
        }
        $infosFichier = pathinfo($_FILES['rapport']['name']);
        $extension_upload = $infosFichier['extension'];
        $extension_upload = strtolower($extension_upload);
        $extension_autorisees = array('pdf');
        if(!in_array($extension_upload, $extension_autorisees)){
            $msg=" Erreur, veuillez inserer un fichier pdf !";
            $url="newRapportMiss";
            header("location:message.php?msg=$msg&color=r&url=$url");
            exit;
        }
    
        $nom_rapport ="rapport". $id .".".$extension_upload;
        if(!move_uploaded_file($temp_name, $rapport.$nom_rapport)){
            $msg="Probleme lors du televersement du Rapport, ressayez";
            $url="newRapportMiss";
            header("location:message.php?msg=$msg&color=r&url=$url");
            exit;
        }
        $rap_name = $nom_rapport;
    }else{
        $msg="Inserez le Support de Cours";
        $url="newSupport";
        header("location:message.php?msg=$msg&color=r&url=$url");
        exit;
    }

    $requete=$conn->prepare("INSERT INTO Participer(lieu,date,duree,rapport,idParticipant,idSeminaire) VALUES(:lieu,:date,:duree,:rapport,:idParticipant,:idSeminaire)");
        
    $requete->execute(array(
        'lieu' => $lieu,
        'date' => $date,
        'duree' => $dure,
        'rapport' => $rap_name,
        'idParticipant' => $idParti,
        'idSeminaire' =>$id));

        $msg="Rapport ajoute avec succèes";
        $url="seminaireParti";
        header("location:message?msg=$msg&color=v&url=$url");
    }
		
?>
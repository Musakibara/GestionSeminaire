<?php

            
    require_once('connexiondb.php');

	
        $idConsult=$_GET['idConsultant'];
        

        $requete="DELETE from Consultant where idConsultant=?";
        
        $valeur=array($idConsult);
        
        $resultat=$conn->prepare($requete);

        $resultat->execute($valeur);
        

        $msg=" Le Consultant a ete supprime avec succès ! ✅";
        $url="consultant";
        header("location:message?msg=$msg&color=v&url=$url");
        
    
    //Récupérer l'ID de l'utilisateur à supprimer
    // if (isset($_GET['idParticipant'])) {
        // $IdParti = intval($_GET['idParticipant']); // S'assurer que l'ID est un entier

        //Préparer et exécuter la requête de suppression
        // $stmt = $conn->prepare("DELETE FROM Participant WHERE idParticipant = :idParticipant");
        // $stmt->bindParam(':id', $IdParti, PDO::PARAM_INT);

        // if ($stmt->execute()) {

            // $msg=" Le Participant a ete supprimé avec succès! ";
            // $url="Participant.php";
            // header("location:message.php?msg=$msg&color=v&url=$url");
        // 
        // } else {
            // echo "Erreur lors de la suppression du Participant. ❌";
        // }
    // } else {

        // $msg=" Aucun ID de Participant spécifié. ⚠️";
        // $url="Participant.php";
        // header("location:message.php?msg=$msg&color=y&url=$url");
        // 
    // }
    
?>
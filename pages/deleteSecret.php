<?php

            
        require_once('connexiondb.php');

	
        $idSecret=$_GET['idSecretaire'];
        

        $requete="DELETE from Secretaire where idSecretaire=?";
        
        $valeur=array($idSecret);
        
        $resultat=$conn->prepare($requete);

        $resultat->execute($valeur);
        

        $msg=" La Secretaire a ete supprime avec succès";
        $url="secretaire";
        header("location:message?msg=$msg&color=v&url=$url");
        
    
    
?>
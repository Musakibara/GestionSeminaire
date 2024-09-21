<?php

            
        require_once('connexiondb.php');

	
        $idSemin=$_GET['idSeminaire'];
        

        $requete="DELETE from Seminaire where idSeminaire=?";
        
        $valeur=array($idSemin);
        
        $resultat=$conn->prepare($requete);

        $resultat->execute($valeur);
        

        $msg=" Le Seminaire a ete supprime avec succès";
        $url="seminaire";
        header("location:message?msg=$msg&color=v&url=$url");
        
    
    
?>
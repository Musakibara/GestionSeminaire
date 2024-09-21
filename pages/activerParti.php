<?php
        session_start();
        if(isset($_SESSION['nom'])){
            
            require_once('connexiondb.php');
            
            $id=isset($_GET['idParticipant'])?$_GET['idParticipant']:0;
            
            $etat=isset($_GET['etat'])?$_GET['etat']:0;
        
            if($etat==1)
                $newEtat=0;
            else
                $newEtat=1;

            $requete="update Participant set etat=? where idParticipant=?";
            
            $params=array($newEtat,$id);
            
            $resultat=$conn->prepare($requete);
            
            $resultat->execute($params);
            
            header('location:participant');
            
     }else {
                header('location:login');
        }
?>
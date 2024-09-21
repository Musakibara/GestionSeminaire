<?php
        session_start();
        if(isset($_SESSION['nom'])){
            
            require_once('connexiondb.php');
            
            $id=isset($_GET['idConsultant'])?$_GET['idConsultant']:0;
            
            $etat=isset($_GET['etat'])?$_GET['etat']:0;
        
            if($etat==1)
                $newEtat=0;
            else
                $newEtat=1;

            $requete="update Consultant set etat=? where idConsultant=?";
            
            $params=array($newEtat,$id);
            
            $resultat=$conn->prepare($requete);
            
            $resultat->execute($params);
            
            header('location:consultant.php');
            
     }else {
                header('location:login.php');
        }
?>
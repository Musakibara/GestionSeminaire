<?php   
	require('connexiondb.php');
    include('../fonctions/fonctionParti.php');	
    

    if(isset($_POST['update_btn'])){

        $id = $_POST['idParticipant']; 
        $nomParti = $_POST['nomParti'];
        $email = $_POST['email'];
		$phone = $_POST['numTel'];
		$nomStructure = $_POST['nomStructure'];
        
        $nbr_user=rechercher_par_nom($nomParti);
        $nbr_email = rechercher_par_email($email);

        if($nbr_user==0 and $nbr_email==0){

            $update = $conn->prepare("UPDATE Participant SET nomParti = '$nomParti', email = '$email', numTel='$phone', nomStructure='$nomStructure'  WHERE idParticipant = '$id'");

            $resultat = $update->execute();

            if($resultat){

                $msg="Participant modifiee avec succèes";
                $url="participant";
                header("location:message?msg=$msg&color=v&url=$url");
            }else{

                $msg= "No Participant found";
                $url="participant";		
                header("location:message?msg=$msg&color=r&url=$url");
            }
        }else{
            $msg= "Le nom ou l'email est déja utilisé par une autre Participant";
            $url="participant";		
            header("location:message?msg=$msg&color=r&url=$url");
         }
    }
		
?>
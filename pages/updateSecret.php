<?php   
	require('connexiondb.php');
    include('../fonctions/fonctionSecret.php');	
    

    if(isset($_POST['update_btn'])){

        $id = $_POST['idSecretaire']; 
        $name = $_POST['nomSecret'];
        $email = $_POST['email'];
        
        $nbr_user=rechercher_par_nom($name);
        $nbr_email = rechercher_par_email($email);

        if($nbr_user==0 and $nbr_email==0){

            $update = $conn->prepare("UPDATE Secretaire SET nomSecret = '$name', email = '$email' WHERE idSecretaire = '$id'");

            $resultat = $update->execute();

            if($resultat){

                $msg="Informations de la Secretaire modifiees avec succèes";
                $url="secretaire";
                header("location:message?msg=$msg&color=v&url=$url");
            }else{

                $msg= "No Secretary found";
                $url="secretaire";		
                header("location:message?msg=$msg&color=r&url=$url");
            }
        }else{
            $msg= "Le nom ou l'email est déja utilisé par une autre Secretaire";
            $url="secretaire";		
            header("location:message?msg=$msg&color=r&url=$url");
         }
    }
		
?>
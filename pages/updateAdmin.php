<?php   
	require('connexiondb.php');
    include('../fonctions/fonctionAdmin.php');	
    

    if(isset($_POST['update_btn'])){

        $id = $_POST['idAdministrateur']; 
        $name = $_POST['nom'];
        $email = $_POST['email'];
        $pwd = $_POST['mot_de_passe'];
        
        $nbr_user=rechercher_par_nom($name);
        $nbr_email = rechercher_par_email($email);

        if($nbr_user==0 and $nbr_email==0){

            $update = $conn->prepare("UPDATE Administrateur SET nom = '$name', email = '$email', mot_de_passe = '$pwd' WHERE idAdministrateur = '$id'");

            $resultat = $update->execute();

            if($resultat){

                $msg="Informations de l'Administrateur modifiees avec succèes";
                $url="Admin";
                header("location:message?msg=$msg&color=v&url=$url");
            }else{

                $msg= "No Administrator found";
                $url="Admin";		
                header("location:message?msg=$msg&color=r&url=$url");
            }
        }else{
            $msg= "Le nom ou l'email est déja utilisé par une autre Administrator";
            $url="Admin";		
            header("location:message?msg=$msg&color=r&url=$url");
         }
    }
		
?>
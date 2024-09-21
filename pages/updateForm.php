<?php   
	require('connexiondb.php');
    include('../fonctions/fonctionForm.php');	
    

    if(isset($_POST['update_btn'])){

        $id = $_POST['idConsultant']; 
        $denomination = $_POST['denomination'];
        $formateur1 = $_POST['formateur1'];
        $formateur2 = $_POST['formateur2'];
        $formateur3 = $_POST['formateur3'];
        $email = $_POST['email'];
        $numTel = $_POST['numTel'];
        $NIU = $_POST['NIU'];
        
        $nbr_user=rechercher_par_nom($formateur1, $formateur2, $formateur3);

        if($nbr_user==0){

            $update = $conn->prepare("UPDATE Consultant SET denomination= '$denomination', formateur1= '$formateur1', formateur2= '$formateur2',formateur3= '$formateur3', email= '$email', numTel= '$numTel', NIU= '$NIU' WHERE idConsultant = '$id'");

            $resultat = $update->execute();

            if($resultat){

                $msg="Informations du Consultant modifiees avec succèes";
                $url="consultant";
                header("location:message?msg=$msg&color=v&url=$url");
            }else{

                $msg= "No Consultant found";
                $url="consultant";		
                header("location:message?msg=$msg&color=r&url=$url");
            }
        }else{

            $msg= "Le nom est déja utilisé par un autre Consultant";
            $url="consultant";		
            header("location:message?msg=$msg&color=r&url=$url");
         }
    }
		
?>
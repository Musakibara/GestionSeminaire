<?php
try {

    $conn = new PDO("mysql:host=localhost;dbname=gestion_semin",
        "root", "");

}catch (Exception $e){
    die('Erreur : ' . $e->getMessage());

    //die('Erreur : impossible de se connecter à la base de donnée');
}
?>


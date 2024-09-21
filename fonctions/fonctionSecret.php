<?php

function rechercher_par_nom($name){
    global $conn;
    $requete=$conn->prepare("select * from Secretaire where nomSecret =?");
    $requete->execute(array($name));
    return $requete->rowCount();
}


function rechercher_par_email($email){
    global $conn;
    $requete=$conn->prepare("select * from Secretaire where email =?");
    $requete->execute(array($email));
    return $requete->rowCount();
}

function rechercher_user_par_email($mot_de_passe){
    global $conn;

    $requete=$conn->prepare("select * from Secretaire where email =?");

    $requete->execute(array($mot_de_passe));

    $Secret=$requete->fetch();

    if($Secret)
        return $Secret;
    else
        return null;
}

//Recherche par login et pwd (Soit l'utilisateur soit NULL)
function recherche_user_byLoginPwd($name, $mot_de_passe)
{
     global $conn;
	 
    $requete = $conn->prepare("select * from Secretaire where nomSecret=? and mot_de_passe=?");

    $requete->execute(array($name,$mot_de_passe));

    $Secret=$requete->fetch();

    if($Secret)   // si l'utilisateur existe
        return $Secret;
    else   // si l'utilisateur n'existe pas
    return 0;


    // $valeur = array($name, $mot_de_passe);
    // $req->execute($valeur);
    // $nbr_user = $req->rowCount();

    // if ($nbr_user == 1) // si l'utilisateur existe
        // return $req->fetch(); //Retourner l'utilisateur(idSecretaire,name,mot_de_passe)
    // else // si l'utilisateur n'existe pas
        // return 0;

}

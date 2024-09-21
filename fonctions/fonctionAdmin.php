<?php

function rechercher_par_nom($name){
    global $conn;
    $requete=$conn->prepare("select * from Administrateur where nom=?");
    $requete->execute(array($name));
    return $requete->rowCount();
}


function rechercher_par_email($email){
    global $conn;
    $requete=$conn->prepare("select * from Administrateur where email =?");
    $requete->execute(array($email));
    return $requete->rowCount();
}


function dateEnToDateFr($dateEn)
{
    //$dateEn='2019-02-26';
    return substr($dateEn, 8, 2) . "/" . substr($dateEn, 5, 2) . "/" . substr($dateEn, 0, 4);
    // Result: '26/02/2019'
}

function dateFrToDateEn($dateFr)
{
    //$dateFR='26/02/2019';
    return substr($dateFr, 6, 4) . "-" . substr($dateFr, 3, 2) . "-" . substr($dateFr, 0, 2);
    // Result: '2019-02-26'
}

//Effectif des Participants 

function getEffectifParti()
{
    global $conn;
    $res = $conn->query("select count(*) countParti from Participant");
    $nbr = $res->fetch();
    return $nbr['countParti'];
}

//Effectif des  Secretaire
function getEffectifSecret()
{
    global $conn;
    $res = $conn->query("select count(*) countSecret from Secretaire");
    $nbr = $res->fetch();
    return $nbr['countSecret'];
}

//Effectif des Consultants
function getEffectifConsul()
{
   global $conn;
    $res = $conn->query("select count(*) countConsul from Consultant");
    $nbr = $res->fetch();
    return $nbr['countConsul'];
}

//Effectif des Seminaires
function getEffectifSemin(){
    global $conn;
    $res = $conn->query("select count(*) countSemin from Seminaire");
    $nbr = $res->fetch();
    return $nbr['countSemin'];
}

//Effectif des partiipants actifs

function getEffectifPartiActif(){
    global $conn;
    $res = $conn->query("select count(*) countPartiActif from Participant where etat = 1");
    $nbr = $res->fetch();
    return $nbr['countPartiActif'];
}

//Effectif des consultants actifs

function getEffectifConsulActif(){
    global $conn;
    $res = $conn->query("select count(*) countConsulActif from Consultant where etat = 1");
    $nbr = $res->fetch();
    return $nbr['countConsulActif'];
}

?>

   


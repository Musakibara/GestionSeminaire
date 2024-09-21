<?php

function rechercher_par_nom($formateur1, $formateur2, $formateur3){
    global $conn;
    $requete=$conn->prepare("select * from Consultant where formateur1 =? and formateur2 =? and formateur3 =?");
    $requete->execute(array($formateur1, $formateur2, $formateur3));
    return $requete->rowCount();
}

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


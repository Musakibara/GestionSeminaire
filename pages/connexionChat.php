<?php

    require('identifier.php'); 


?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion |  chat</title>
    <link rel="stylesheet" href="../CSS/style5.css">
</head>
<body>

    <form action="" class="form_connexion_inscription">
        <h1>CONNEXION</h1><br>
        <p class="message_error">
            Mots de passe incorrect
        </p><br>
        <label for="">Adresse Mail</label>
        <input type="email" name="email">
        <label for=""> Mots de passe</label>
        <input type="password" name="mdp1">
        <input type="submit" value="Connexion">
        <p class="link">Vous avez un compte ? <a href="#">Créer un compte</a></p>
    </form>
</body>
</html>
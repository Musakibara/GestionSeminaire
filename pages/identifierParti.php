<?php
    session_start();
    
    if(!isset($_SESSION['nomParti'])) {
        header('location:loginParti');
        exit();
    }

?>

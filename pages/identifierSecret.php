<?php
    session_start();
    
    if(!isset($_SESSION['nomSecret'])) {
        header('location:loginSecret');
        exit();
    }

?>

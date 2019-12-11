<?php
    include('header.php');

    //Utilisez la fonction de suppression de session
    session_destroy();

    header('Location:index.php');
    die;
?>

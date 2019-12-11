<?php
    include("config/bdd.php");
    session_start();
    try{
        $bdd = new PDO('mysql:host='.$BDD_HOST.';dbname='.$BDD_DB.';charset=utf8', $BDD_USER, $BDD_PASS);
    }
    catch(Exception $e){
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        die('Erreur : '.$e->getMessage());
    }

?>

<html>
    <head>
        <title>Relevé de notes</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Prof Notation</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>

                <!-- Liens à n'afficher qu'aux professeurs -->
                <?php
                if ((isset($_SESSION['type'])) and ($_SESSION['type'] == "prof")) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="examen_ajout.php">Créer un examen</a>
                    <a class="nav-link" href="examens_liste.php">Liste des examens</a>
                </li>
                <?php
                }
                ?>
                <!-- Fin des liens à n'afficher qu'aux professeurs -->
            </ul>
            <div class="form-inline my-2 my-lg-0">
            <?php
                if(isset($_SESSION["id"])){
                    ?>
                    <span><?= $_SESSION["prenom"].' '.$_SESSION["nom"] ?></span>
                    <a href="deconnexion.php" class="btn btn-primary">Déconnexion</a>
                    <?php
                }else{
                    ?>
                    <a href="connexion.php" class="btn btn-primary">Connexion</a>
                    <?php
                }
            ?>


            </div>
        </div>
        </nav>

<?php
    include('header.php');

?>
<div class="container">
    <h1>Page d'accueil</h1><br>
    <?php
    if (!isset($_SESSION['id'])) {

    }
    else if (isset($_SESSION['id']) and ($_SESSION['roles'] == "prof")) {

    }
    else
        {

        }
     ?>
    <!-- Contenu à afficher si l'utilisateur n'est pas connecté -->
    <p>Bienvenue sur la page permettant aux professeurs d'insérer leurs notes et aux élèves de les consulter.</p>
    <!-- Fin du contenu -->


    <!-- Contenu à afficher si l'utilisateur est un professeur -->
        <!-- Liste de tous les examens créés par le professeur -->
    <!-- Fin du contenu -->


    <!-- Contenu à afficher si l'utilisateur est un élève -->
        <!-- Liste des moyennes par matière pour l'élève connecté -->
    <!-- Fin du contenu -->
</div>

<?php
    include('footer.php');
?>

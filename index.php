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

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">matiere</th>
            <th scope="col">note</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $req1 = $bdd->query("SELECT  matiere  from utilisateurs WHERE type='prof'" );
           while($matiere = $req1->fetch()) {
               $req = $bdd->prepare("SELECT AVG( notes.note) from notes, utilisateurs , examens WHERE  utilisateurs.matiere = ? and examens.prof_id = utilisateurs.id_utilisateur and notes.ELEVE_ID = 3 and notes.EXAMEN_ID = examens.id    ");
               $req->execute([$matiere['matiere']]);

               ?>
                   <tr>

                       <th scope="row"><?php echo $matiere['matiere'] ?></th>
                       <td ><?php echo $req->fetchAll()[0][0] ?></td>
                       <td>
                           <a href="recap_matiere.php?matiere=<?php echo $matiere['matiere']; ?>">
                               <button type="button" class="btn btn-info">Consulter</button>
                           </a>
                       </td>
                   </tr>
               <?php
           }




        ?>
    <!-- Fin du contenu -->
</div>

<?php
    include('footer.php');
?>

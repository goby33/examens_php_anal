<?php
    include('header.php');
?>

<div class="container">
    <h1>Saisie des notes de l'axamen ...</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Note</th>
        </tr>
        </thead>
        <tbody>
        <form action="" method="post">
    <?php
    if (isset($_POST)) {
        if (count($_POST) != 0) {
            $erreur = 0;
            foreach ( $_POST as $key => $note) {
                if (empty($_POST[$key])) {
                   $erreur = 1;
                }
                else {
                    $req = $bdd->prepare("INSERT INTO notes (note , ELEVE_ID , EXAMEN_ID) values (:note , :ELEVE_ID , :EXAMEN_ID)");
                    $req->execute([
                        ':note' => $note ,
                        ':ELEVE_ID' => explode("note_id_" , $key )[1],
                        ':EXAMEN_ID' => $_GET['id'],
                    ]);
                }

            }
            if ($erreur) {
                ?>
                <div class="alert alert-danger" role="alert">
                    /!\ Une des notes est vide /!\
                </div>
                <?php
            } else {
                header('Location:index.php');
            }
        }
    }
    if (isset($_SESSION['type']) and ($_SESSION['type'] == "prof")) {
        if (isset($_GET['id']) and (is_numeric($_GET['id']) ))  {
            $req = $bdd->query("SELECT * FROM utilisateurs WHERE type = 'eleve'");
            while ($resultat = $req->fetch()) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $resultat['id_utilisateur'] ?></th>
                        <td ><?php echo $resultat['nom'] ?></td>
                        <td> <?php echo $resultat['prenom'] ?></td>
                        <td><input type="number" name="note_id_<?php echo $resultat['id_utilisateur'] ?>"></td>
                    </tr>
                <?php
            }
        }
    }
    ?>
            <button type="submit" class="btn btn-primary">Envoyer les notes</button>
        </form>

        </tbody>
    </table>
</div>


<?php
    include('footer.php');
?>

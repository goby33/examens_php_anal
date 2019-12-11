<?php
    include('header.php');
?>

<div class="container">
    <?php
    if (isset($_SESSION['type']) and ($_SESSION['type'] == "prof")) {
        if (isset($_GET['id']) and (is_numeric($_GET['id']) ))  {
            $req = $bdd->prepare("DELETE FROM examens WHERE id = ?");
            $req->execute([$_GET['id']]);
        }
    }

    ?>
    <h1>Liste des examens</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">date examens</th>
            <th scope="col">type</th>
            <th scope="col">coef</th>
            <th scope="col">Ajouter note</th>
            <th scope="col">Modifier</th>
            <th scope="col">Suprimer</th>

        </tr>
        </thead>
        <tbody>
    <?php
    $requette = $bdd->query('select * from examens');
    $requette->execute();
    foreach ( $requette->fetchAll() as $ligne)
    {
        ?>
            <tr>
                <th scope="row"><?php echo $ligne['id'] ?></th>
                <td ><?php echo $ligne['date_examen'] ?></td>
                <td> <?php echo $ligne['type'] ?></td>
                <td><?php echo $ligne['coef'] ?></td>

                <td>
                    <a href="saisie_notes.php?id=<?php echo $ligne['id'] ?>">
                        <button type="button" class="btn btn-success">Ajouter</button>
                    </a>
                </td>
                <!-- -->
                <td>
                    <a href="examen_modification.php?id=<?php echo $ligne['id'] ?>">
                        <button type="button" class="btn btn-warning">Modifier</button>
                    </a>
                </td>
                <!-- -->
                <td>
                    <a href="examens_liste.php?id=<?php echo $ligne['id'] ?>">
                        <button type="button" class="btn btn-danger">Suprimer</button>
                    </a>
                </td>
            </tr>

        <?php
    }
    ?>
        </tbody>
    </table>



</div>


<?php
    include('footer.php');
?>

<?php
    include('header.php');
?>

<div class="container">
    <h1>Notes obtenues en <?php echo $_GET['matiere'] ?></h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">date examens</th>
            <th scope="col">type</th>
            <th scope="col">coef</th>
            <th scope="col">note</th>
        </tr>
        </thead>
        <tbody>
    <?php
    $req = $bdd->query("SELECT examens.date_examen , examens.type, examens.coef, notes.note from notes, utilisateurs , examens WHERE  utilisateurs.matiere = 'math' and examens.prof_id = utilisateurs.id_utilisateur and notes.ELEVE_ID = 3 and notes.EXAMEN_ID = examens.id    ");
    while ($resultat = $req->fetch()) {
        ?>
    <tr>
        <th scope="row"><?php echo $resultat['date_examen'] ?></th>
        <td ><?php echo $resultat['date_examen'] ?></td>
        <td> <?php echo $resultat['type'] ?></td>
        <td> <?php echo $resultat['coef'] ?></td>
        <td><?php echo $resultat['note'] ?></td>
    </tr>
        <?php

    }


    ?>
</div>


<?php
    include('footer.php');
?>

<?php
    include('header.php');
?>

<div class="container">
    <h1>Ajouter un examen</h1>

    <?php
    if ((isset($_SESSION['type'])) && ($_SESSION['type'] != 'prof')) {
        header('Location:index.php');
    }

    if (isset($_POST['date_examen'])) {
        if ((!empty($_POST['date_examen'])) && (!empty($_POST['coef_examens'])) && (!empty($_POST['type_examen']))) {
           $requete =  $bdd->prepare('INSERT INTO examens ( date_examen, type, coef, prof_id) VALUES  (:date_examen ,  :type , :coef , :prof_id)');
           $requete->execute([
                    ':date_examen' => $_POST['date_examen'],
                    ':type' => $_POST['type_examen'],
                    ':coef'=> $_POST['coef_examens'],
                    ':prof_id' => $_SESSION['id']
            ]);
        }
        else {
            echo "Erreur : veuillez tous remplir ";
        }
    }
    ?>
    <form action="" method="post">
        <label for="date_examen">DATE :</label>
        <input type="date" id="date_examen" name="date_examen"> <br />

        <label for="type_examen">TYPE :</label>
        <select id="type_examen" name="type_examen">
            <option value="DS">DS</option>
            <option value="DS">INTERRO</option>
            <option value="DS">PARTIEL</option>
        </select> <br />

        <label for="coef_examens">Coef</label>
        <input type="number" id="coef_examens"  name="coef_examens"/>
        <br />
        <input type="submit">

    </form>


</div>


<?php
    include('footer.php');
?>

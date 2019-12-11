<?php
    include('header.php');
?>

<div class="container">
    <h1>Modifier un examen</h1>
    <?php

    if (isset($_SESSION['type']) and ($_SESSION['type'] == "prof")) {

        if (isset($_POST['date_examen'])) {
            if ((!empty($_POST['date_examen'])) && (!empty($_POST['coef_examens'])) && (!empty($_POST['type_examen']))) {
                $req = $bdd->prepare('UPDATE examens SET  date_examen = :date_examen, type = :type, coef = :coef WHERE  id = :id');
                $req->execute([
                    ':date_examen' => $_POST['date_examen'],
                    ':type' => $_POST['type_examen'],
                    ':coef' => $_POST['coef_examens'],
                    ':id' => $_GET['id']

                ]);
            }
        }

        /*  ldlddl*/
        if (isset($_GET['id']) and (is_numeric($_GET['id']) )) {
            $req = $bdd->prepare("SELECT * from examens WHERE id = ?");
            $req->execute([$_GET['id']]);
            $result = $req->fetchAll();
            if (count($result) != 0) {
                ?>
                <form action="" method="post">
                    <label for="date_examen">DATE :</label>
                    <input type="date" id="date_examen" name="date_examen" value="<?php echo $result[0]['date_examen']; ?>"> <br />

                    <label for="type_examen">TYPE :</label>
                    <select id="type_examen" name="type_examen" >
                        <?php
                            $tableau_DS = ['PARTIEL' , 'DS' , 'INTERRO'];
                            foreach ($tableau_DS as $valeur ) {
                                if ($result[0]['type'] == $valeur) {
                                    echo '<option value="'.$valeur.'"  selected>'.$valeur.'</option>';
                                }
                                else {
                                    echo '<option value="'.$valeur.'" >'.$valeur.'</option>';
                                }
                            }
                        ?>


                    </select> <br />

                    <label for="coef_examens">Coef</label>
                    <input type="number" id="coef_examens"  name="coef_examens" value="<?php echo $result[0]['coef']; ?>"/>
                    <br />
                    <input type="submit" value="modifier">

                </form>
                <?php
            }
            else {
                echo "pas de resultat";
            }

        }
        else {
            header('Location:index.php');
        }
    }
    ?>


</div>


<?php
    include('footer.php');

?>

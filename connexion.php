<?php
    include('header.php');

    if(isset($_POST['pseudo'])){
        // Je cherche un ou des utilisateurs avec le même pseudo et même mot de passe
        $sql = "SELECT * FROM `utilisateurs` WHERE pseudo=? AND motdepasse=?";
        $users = $bdd->prepare($sql);
        $users->execute([
            $_POST["pseudo"], md5($_POST["password"])
        ]);

        $user = $users->fetchAll();
        $msg = null;
        //Si mon utilisateur existe dans la BDD
        if(count($user)){
            //Insérer le code permettant de mettre les nom, prénom, id et type en session
            print_r($user);
            $_SESSION['id'] = $user[0]['id_utilisateur'];
            $_SESSION['nom'] = $user[0]['nom'];
            $_SESSION['prenom'] = $user[0]['prenom'];
            $_SESSION['type'] = $user[0]['type'];
            //Je redirige mon utilisateur vers la page d'accueil
           header('Location:index.php');
            die;
        }else{
            $msg = "Erreur lors de la connexion";
        }

    }
?>

<div class="container">
    <h1>Connexion</h1>

    <form action="" method="POST">
        <?php
            if(isset($msg) && $msg){
                ?>
                    <div class="alert alert-danger" role="alert">
                    <?= $msg ?>
                    </div>
                <?php
            }
        ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Pseudo</label><input type="text" name='pseudo' class="form-control" required="required">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Mot de passe</label><input type="password" name='password' class="form-control" required="required">
        </div>
        <input type="submit" value="Se Connecter" class="btn btn-primary">
    </form>
</div>


<?php
    include('footer.php');
?>

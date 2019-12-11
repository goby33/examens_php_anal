<?php

    include('header.php');

    $success = null;
    if(isset($_POST['pseudo'])){
        $message = "Inscription enregistrée";
        $success = true;
        $sql = "INSERT INTO `utilisateurs`(`prenom`, `nom`, `pseudo`, `motdepasse`, `type`) VALUES (?,?,?,?,?)";
        try{
            $insert = $bdd->prepare($sql);
            $insert->execute(array(
                $_POST["prenom"], $_POST["nom"], $_POST["pseudo"], md5($_POST["password"]), $_POST["type"]
            ));
        }
        catch(Exception $e){
            $message = "Inscription ratée";
            $success = false;
        }
        
    }

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Page d'inscription</h1><br><br>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <div class="col-md-12">
                        <?php
                            if($success !== null){
                                ?>
                                    <div class="alert alert-<?php echo($success === true ? "success" : "error"); ?>" role="alert"><?= $message ?></div>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Prénom</label>
                        <input type="text" class="form-control" name="prenom" placeholder="Prénom" required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nom</label>
                        <input type="text" class="form-control" name="nom" placeholder="Nom" required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pseudo</label>
                        <input type="text" class="form-control" name="pseudo" placeholder="Pseudo" required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mot de passe</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type" id="type" class="form-control" required="required">
                            <option value="eleve" selected='selected'>Elève</option>
                            <option value="prof">Professeur</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Matière (si c'est un prof)</label>
                        <input type="text" class="form-control" name="matiere" placeholder="Matière">
                    </div>
                    <button type="submit" class="btn btn-primary">Créer l'utilisateur</button>
                </form>
            </div>
        </div>
    </div>
    
    
<?php
    include('footer.php');
    ?>
    <script>
        $(document).ready(function(){
            isProf(); 
            function isProf(){
                if($('select#type option:selected').val() == "prof"){
                    $('input[name=matiere]').attr('disabled',false);
                }else{
                    $('input[name=matiere]').val("");
                    $('input[name=matiere]').attr('disabled',true);
                }
            }

            $('select[name=type]').on('change', function(){
                isProf();
            });
        });
        
    </script>
<?php

session_start();

$invalidPassword = false;

include_once ("connexion.php");
include_once ("fonctions.php");

if (isset($_POST) && !empty($_POST["nom"]) && !empty($_POST["motDePasse"])) {
    $link_db = connect_to_db();
    $success = check_admin_creds($link_db, $_POST["nom"], $_POST["motDePasse"]);
    close_db($link_db);

    if ($success) {
        $_SESSION["admin"] = "admin";
        header("Location: /admin.php");
        exit;
    } else {
        $invalidPassword = true;
    }
}

?>

<!doctype html>
<html lang="fr">
    <head>
        <?php include ("head.php"); ?>
    </head>

    <body>
        <div id="header"> 
            <div class="logo">
                <img src="bee.png" width=10% height=100%/>
            </div>
        </div>
       
        <div class="menu">
            <a href="/">Maison</a>
        </div>
        
        <div class="detail container">
            <?php if ($invalidPassword) { ?>
                <div class="alert alert-danger" role="alert">
                    Le nom ou le mot de passe n'est pas bon!
                </div>
            <?php } ?>

            <form method="post">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Admin">
                </div>
                <div class="form-group">
                    <label for="motDePasse">Mot de passe</label>
                    <input type="password" class="form-control" id="motDePasse" name="motDePasse" placeholder="Mot de passe">
                </div>
                <button type="submit" class="btn btn-primary">Connecter</button>
            </form>
        </div>
    </body>
              
</html>

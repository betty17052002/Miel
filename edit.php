<?php
session_start();

include_once ("check_admin.php");

include_once ("connexion.php");
include_once ("fonctions.php");
include_once ("miel.php");


if (isset($_POST) && isset($_GET["id"]) && isset($_POST["delete"]) == "delete") {
    $link_db = connect_to_db();
    delete_honey($link_db, $_GET["id"]);
    close_db($link_db);

    header("Location: /admin.php");

    exit;
}

if (isset($_POST) && !empty($_POST["mielNom"]) && !empty($_POST["mielApiculteur"]) && !empty($_POST["mielPrix"]) && !empty($_POST["mielImage"])) {
    $miels = array();

    $miels["nom_miel"] = $_POST["mielNom"];
    $miels["apiculteur"] = $_POST["mielApiculteur"];
    $miels["prix"] = $_POST["mielPrix"];
    $miels["image"] = $_POST["mielImage"];

    $link_db = connect_to_db();

    if (isset($_GET["id"])) {
        update_honey($link_db, $_GET["id"], $miels);
    } else {
        add_honey($link_db, $miels);
    }

    close_db($link_db);

    header("Location: /admin.php");

    exit;
}

$miel;

if (isset($_GET["id"])) {
    $link_db = connect_to_db();
    $miel = get_honey_by_id($link_db, $_GET["id"]);
    close_db($link_db);
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
            <a href="admin.php">Tous les produits</a>
        </div>
        
        <div class="detail container">
            <form method="post">
                <div class="form-group">
                    <label for="mielNom">Nom du miel</label>
                    <input type="text" class="form-control" id="mielNom" name="mielNom" placeholder="Nouveau Miel" value="<?php echo $miel["nom_miel"]; ?>">
                </div>
                <div class="form-group">
                    <label for="mielApiculteur">Apiculteur</label>
                    <input type="text" class="form-control" id="mielApiculteur" name="mielApiculteur" placeholder="Nouveau Apiculteur" value="<?php echo($miel["apiculteur"]); ?>">
                </div>
                <div class="form-group">
                    <label for="mielPrix">Prix</label>
                    <input type="text" class="form-control" id="mielPrix" name="mielPrix" placeholder="10 EURO" value="<?php echo($miel["prix"]); ?>">
                </div>
                <div class="form-group">
                    <label for="mielImage">Foto pour le miel</label>
                    <input type="text" class="form-control" id="mielImage" name="mielImage" placeholder="https://example.com/miel.png" value="<?php echo($miel["image"]); ?>">
                </div>
                    
                <button type="submit" class="btn btn-primary">D'accord</button>
                
                <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteBtn').click()">Annuler</button>
            </form>
            
            <form method="post" style="display: none">
                <input type="text" name="delete" value="delete" hidden style="display: none">
                <button type="submit" id="deleteBtn"></button>
            </form>
        </div>
    </body>
              
</html>


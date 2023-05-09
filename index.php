<?php
session_start();

// Déclaration d'une variable '$page_a_afficher' vide
$page_a_afficher="";
//Test si le paramètre 'page' figure das l'URL
if (isset ($_GET['page'])) {
    //Si oui récupere la valeur de ce paramètre 'page' avec $_GET et on la copie dans '$page_a_afficher'
    $page_a_afficher = $_GET['page'];
}

//Decommenter cette ligne pour afficher le contenu de '$page_a_afficher'
echo $page_a_afficher;

//Inclure le fichier qui contient la définition de la classe Article
include_once ("miel.php");
include_once ("connexion.php");
include_once ("fonctions.php");
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
            <a href="admin.php">Admin</a>
        </div>
        
        <div class="detail">
            <?php include("accueil.php"); ?>
        </div>
        
        <div id="footer"> 
            <div class="gauche">
                </div>
                <div class="droite">
            </div>
        </div>

        <?php include_once ("dialogues.php"); ?>

        <?php
            if (isset($_GET["scrollLeft"]) && isset($_GET["scrollTop"])) {
        ?>
            <script>
                window.addEventListener('load', () => {
                    setTimeout(() => {
                        SetScroll(<?php echo $_GET["scrollLeft"]; ?>, <?php echo $_GET["scrollTop"]; ?>);
                    }, 100);
                });
            </script>
        <?php
            }
        ?>
    </body>
              
</html>


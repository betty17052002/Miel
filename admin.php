<?php
session_start();

include_once ("check_admin.php");

include_once ("connexion.php");
include_once ("fonctions.php");
include_once ("miel.php");

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
            <a href="edit.php">Creer un miel</a>
            <a href="admin-logout.php">Deconnecter</a>
        </div>
        
        <div class="detail">
            <?php include("accueil.php"); ?>
        </div>

        <?php include_once ("dialogues.php"); ?>
    </body>
              
</html>


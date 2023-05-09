<?php

function update_article($id, $fieldName, $contenu){

    $db = connect_to_db();

 // - Modifier le champs $fieldName de l'enregistrement $id dans la table articles en y inscrivant $contenu

	$req_update="update articles set ".$fieldName."='".$contenu."' where id='".$id."'";
   $db->exec($req_update);


    close_db($db);
}

include_once('../connexion.php'); 
//Traitement du POST
if(isset($_POST['action']))
{
 switch ($_POST['action']){
 case 'update' : 
    update_article($_POST["id"], $_POST["fieldName"], $_POST["contenu"]);
    break;
 }
}
?>
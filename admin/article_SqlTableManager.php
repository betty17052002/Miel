<?php

function insert_article($article){
 // - Se connecter à la BDD
    $db = connect_to_db();


   $dateCreation = date_create();
   $dateCreationString = date_format($dateCreation, "Y-m-d H:i");

	$req_update="insert into articles (categorie, titre, contenu, auteur, dateCreation, visible) values ('".$article["categorie"]."', '".$article["titre"]."', '".$article["contenu"]."', '".$article["auteur"]."', '".$dateCreationString."', TRUE)";
   $db->exec($req_update);

    close_db($db);
}

function delete_article($id){
      $db = connect_to_db();
  
     $req_update="delete from articles where id = ".$id;
     $db->exec($req_update);

      close_db($db);
  }


include_once('../connexion.php'); 

if(isset($_POST['action']))
{
 switch ($_POST['action']){
   case 'create' : 
      $article["categorie"] = $_POST["category"];
      $article["titre"] = $_POST["titre"];
      $article["contenu"] = $_POST["body"];
      $article["auteur"] = $_POST["auteur"];
      insert_article($article);
      break;
   case 'delete' :
      delete_article($_POST["id"]);
      break;
 }
}
?>
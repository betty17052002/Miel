<?php

function get_honey_by_id($link_db, $id) {
	$req_miel="select * from miel where id_miel = :id_miel";
	// echo $req_articles;
	$statement = $link_db->prepare($req_miel);
	$statement->execute(array(':id_miel' => $id));
	$enregistrement = $statement->fetch(PDO::FETCH_ASSOC);

	return $enregistrement;
}

function get_all_honeys($link_db) {
	$req_miel="select * from miel ORDER BY id_miel";
	// echo $req_articles;
	$resultat_miel = $link_db->query($req_miel);
	$rows = $resultat_miel->fetchAll(PDO::FETCH_ASSOC);

	$montab = array();
	$i=0;
	
	foreach ($rows as $enregistrement){
		$montab[$i]['id_miel'] = $enregistrement['id_miel'];
        $montab[$i]['nom_miel'] = $enregistrement['nom_miel'];
        $montab[$i]['apiculteur'] = $enregistrement['apiculteur'];
        $montab[$i]['prix'] = $enregistrement['prix'];
        $montab[$i]['image'] = $enregistrement['image'];

        $i++;
		
	}

	return $montab;
}

function add_honey($link_db, $honey) {
	$req = "INSERT INTO miel (nom_miel, apiculteur, prix, image) VALUES (:nom_miel, :apiculteur, :prix, :image)";
	$statement = $link_db->prepare($req);
	$statement->execute(array(
		':nom_miel' => $honey['nom_miel'],
		':apiculteur' => $honey['apiculteur'],
		':prix' => $honey['prix'],
		':image' => $honey['image']
	));
}

function update_honey($link_db, $id, $honey) {
	$req = "UPDATE miel SET nom_miel = :nom_miel, apiculteur = :apiculteur, prix = :prix, image = :image WHERE id_miel = :id";
	$statement = $link_db->prepare($req);
	$statement->execute(array(
		':id' => $id,
		':nom_miel' => $honey['nom_miel'],
		':apiculteur' => $honey['apiculteur'],
		':prix' => $honey['prix'],
		':image' => $honey['image']
	));
}

function delete_honey($link_db, $id) {
	$req = "DELETE FROM miel WHERE id_miel = :id";
	$statement = $link_db->prepare($req);
	$statement->execute(array(
		':id' => $id
	));
}

function get_all_admins($link_db) {
	$req_admin="select * from administrateur ORDER BY id_admin";
	// echo $req_articles;
	$resultat_admin = $link_db->query($req_admin);
	$rows = $resultat_admin->fetchAll(PDO::FETCH_ASSOC);

	$montab = array();
	$i=0;

	foreach ($rows as $enregistrement) {
		$montab[$i]['id_admin'] = $enregistrement['id_admin'];
		$montab[$i]['nom'] = $enregistrement['nom'];
		$montab[$i]['mot_de_passe'] = $enregistrement['mot_de_passe'];

        $i++;	
	}

	return $montab;
}

function check_admin_creds($link_db, $username, $password) {
	$req_admin="select * from administrateur where nom = :username and mot_de_passe = :password";
	$statement = $link_db->prepare($req_admin);
	$statement->execute(array(':username' => $username, ':password' => $password));
	$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

	return count($rows) > 0;
}
?>
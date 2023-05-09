<?php

$host="localhost";
$user="root";
$password="";
$bdd="miel";



function connect_to_db(){
	global $host, $user, $password, $bdd;
	try
	{
		$host_db_charset = 'mysql:host='.$host.';dbname='.$bdd.';charset=UTF8';
		$link_db = new PDO($host_db_charset, $user, $password);
		
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	return $link_db;
}

function close_db($link_db){
	$link_db = null;
}

?>
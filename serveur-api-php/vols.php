<?php
include('template.php');

if( !empty($_GET['ville_depart']) ){
	//Si le client a saisi une ville de depart, on filtre les données via MySQL
	$requete = $pdo->prepare("SELECT * FROM `vols` WHERE `ville_depart` LIKE :nom");
	$requete->bindParam(':nom', $_GET['ville_depart']);
} else {
	//Sinon on affiche tous les vols
	$requete = $pdo->prepare("SELECT * FROM `vols`");
}


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['vols'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);
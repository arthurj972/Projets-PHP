<?php
include('template.php');

if( !empty($_GET['ville_depart']) && !empty($_GET['ville_arrivee']) && !empty($_GET['date_depart']) && !empty($_GET['nb_heure_vol']) && !empty($_GET['prix']) ){
	//Si toutes les données sont saisie par le client

	$requete = $pdo->prepare("INSERT INTO `vols` (`id`, `ville_depart`, `ville_destination`, `date_depart`, `nb_heure_vol`, `prix`) VALUES (NULL, :ville_depart, :ville_arrivee, :date_depart, :nb_heure_vol, :prix);");
	$requete->bindParam(':ville_depart', $_GET['ville_depart']);
	$requete->bindParam(':ville_arrivee', $_GET['ville_arrivee']);
	$requete->bindParam(':date_depart', $_GET['date_depart']);
	$requete->bindParam(':nb_heure_vol', $_GET['nb_heure_vol']);
	$requete->bindParam(':prix', $_GET['prix']);

	if( $requete->execute() ){
		$success = true;
		$msg = 'Le vol a bien été ajouté';
	} else {
		$msg = "Une erreur s'est produite";
	}
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);
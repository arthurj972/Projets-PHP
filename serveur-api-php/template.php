<?php
header('Content-Type: application/json');
$success = false;
$data = array();
include('pdo.php');

function reponse_json($success, $data, $msgErreur=NULL) {
	$array['success'] = $success;
	$array['msg'] = $msgErreur;
	$array['result'] = $data;

	echo json_encode($data);
}
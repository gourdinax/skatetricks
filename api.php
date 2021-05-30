<?php
	session_start();

	include_once './Connexion.php';

	Connexion::initConnexion();

	if (isset($_GET['module'])) {
		$module = $_GET['module'];
	}
	
	switch ($module) {

		case "tricks":
			include_once 'API/tricks/mod_tricks.php';
			$moduleObj = new ModTricks();
			break;

		case "classement":
			include_once 'API/classement/mod_classement.php';
			$moduleObj = new ModClassement();
			break;

		case "gestion":
			include_once 'API/gestion/mod_gestion.php';
			$moduleObj = new ModGestion();
			break;
	}

?>
<?php
	include_once 'API/tricks/cont_tricks.php';
	include_once './Connexion.php';

	Connexion::initConnexion();

	class ModTricks{

		public $controleur;

		function __construct() {
			$this->controleur = new ContTricks();
		}

	}

?>
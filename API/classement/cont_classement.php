<?php

	include_once './API/classement/modele_classement.php';
	include_once './API/classement/vue_classement.php';

	header("Content-Type: application/json; charset=utf-8");

	class ContClassement{

		public $vue;
		public $modele;

		function __construct() {

			$this->vue = new VueClassement();
			$this->modele= new ModeleClassement();
			
			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}

			$user = ( isset( $_GET['user'] ) ? $_GET['user'] : null );

			switch ($action) {

				case 'default':
					$this->listeUser($user);
					break;

			}
		}

		function listeUser($user) {
			$tab = $this->modele->getGlobalScoreUserTricks($user);
			$this->vue->showResultat($tab);
		}

	} 

?>
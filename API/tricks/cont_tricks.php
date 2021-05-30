<?php

	include_once './API/tricks/modele_tricks.php';
	include_once './API/tricks/vue_tricks.php';

	header("Content-Type: application/json; charset=utf-8");

	class ContTricks{

		public $vue;
		public $modele;

		function __construct() {

			$this->vue = new VueTricks();
			$this->modele= new ModeleTricks();
			
			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}

			$tricks = ( isset( $_GET['tricks'] ) ? $_GET['tricks'] : null );

			switch ($action) {

				case 'liste':
					$this->liste($tricks);
					break;

				case 'default':
					break;

			}
		}

		function liste($tricks) {
			$tab = $this->modele->getListeTricks($tricks);
			$this->vue->showResultat($tab);
		}

	} 

?>
<?php

	include_once 'modules/module_tricks/vue_tricks.php';
	include_once 'modules/module_tricks/modele_tricks.php';
    include_once 'lib/php/fonctions.php';

	class ContTricks{

		public $vue;
		public $modele;

		function __construct() {

			$this->vue = new vueTricks();
			$this->modele = new ModeleTricks();

			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}
			
			if( isset( $_SESSION['log_user']) ) {
				switch ($action) {
			
				case 'default' : 
					$this->vue->afficheBase(2);
					$this->vue->menu( $_SESSION['droit'] );
					break;
				
				case 'formAjoutTricks' :
					$this->vue->afficheBase(1); 
					createToken();
					$this->vue->formulaireAjoutTricks($_SESSION['token']);
					break;

				case 'ajoutTricks' : 
					$myToken = $_SESSION['token'];
					$myTimeToken = $_SESSION['timeToken'];
					unset($_SESSION['token']);
					unset($_SESSION['timeToken']);

					if( $_POST['token'] == $myToken && $myTimeToken + 1200 > time() ) {
						$id = htmlspecialchars($_POST["id_tricks"]);
						$description = htmlspecialchars($_POST["desc_tricks"]);

						$this->modele->ajoutTricks($id, $description,  $_SESSION['log_user']);
						
						header('Location: ./index.php?module=tricks');
					}

					break;
				}
			} else {
				header('Location: ./index.php?module=connexion');
			}
		}          
	}
?>

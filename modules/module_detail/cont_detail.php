<?php

	include_once 'modules/module_detail/vue_detail.php';
	include_once 'modules/module_detail/modele_detail.php';
    include_once 'lib/php/fonctions.php';

	class ContDetail{

		public $vue;
		public $modele;
		public $controleurQues;

		function __construct() {

			$this->vue = new vueDetail();
			$this->modele= new ModeleDetail();

			$id_tricks = $_GET['id'];

			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}

			if( isset( $_SESSION['log_user']) ) {
				switch ($action) {
				
					case 'default' : 
						$detail = $this->modele->getTricks($id_tricks);
						$this->vue->afficheBase($detail);
						break;

					case 'note' : 
						$info = $this->modele->checkNoteTricks($id_tricks, $_SESSION['log_user']);
						if(!$info){
							$detail = $this->modele->noteTricks($id_tricks, $_SESSION['log_user']);
						}
						header('Location: ./index.php?module=utilisateur');
						break;

				}
			} else {
				header('Location: ./index.php?module=connexion');
			}
		}          
	}
?>

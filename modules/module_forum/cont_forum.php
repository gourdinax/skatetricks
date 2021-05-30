<?php
	defined( '_NOEXEC' ) or die( "Veuillez gentiment passer par l'index svp." );
	include_once 'modules/module_forum/vue_forum.php';
	include_once 'modules/module_forum/modele_forum.php';
	include_once 'lib/php/fonctions.php';

	class ContForum{

		public $vue;
		public $modele;

		function __construct() {

			$this->vue = new vueForum();
			$this->modele = new ModeleForum();

			$id_tricks = $_GET['idTricks'];
			$auteur = $_SESSION['log_user'];

			if (isset($_GET['action'])) {
				$action = $_GET['action'];
			} else {
				$action = 'default';
			}
			
			if( isset( $_SESSION['log_user']) ) {
				switch ($action) {
				
					case 'default' :
						$tabAll = $this->modele->getAllCom($id_tricks);
			
						$this->vue->afficheBase(1, $id_tricks);
						$this->vue->affCom($tabAll); 
						$this->vue->menu($id_tricks);
						$this->vue->afficheBase(2, $id_tricks);
						break;

					case 'affFormCom':
						createToken();
						$tabAll = $this->modele->getAllCom($id_tricks);

						$this->vue->afficheBase(1, $id_tricks); 
						$this->vue->affCom($tabAll); 
						$this->vue->affFormCom($id_tricks, $_SESSION['token']);
						break;

					case 'ajoutCom' :
						$myToken = $_SESSION['token'];
						$myTimeToken = $_SESSION['timeToken'];
						unset($_SESSION['token']);						
						unset($_SESSION['timeToken']);

						if( $_POST['token'] == $myToken && $myTimeToken + 1200 > time() ){
							$commentaire = htmlspecialchars($_POST["commentaire"]);
							$this->modele->ajoutCom($id_tricks,$commentaire,$auteur);
						}

						$tabAll = $this->modele->getAllCom($id_tricks);

						header('Location:index.php?module=forum&idTricks='.$id_tricks.'');	
						break;
				}
			} else {
				header('Location: ./index.php?module=connexion');
			}
		}          
	 
	}
?>

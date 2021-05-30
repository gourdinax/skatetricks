
<?php
	defined( '_NOEXEC' ) or die( "Veuillez gentiment passer par l'index svp." );

    include_once 'modules/module_tricks/cont_tricks.php';
    include_once './Connexion.php';

     Connexion::initConnexion();

    class ModTricks{

        public $controleur;

         function __construct() {
            
           $this->controleur=new ContTricks();

        }

    }

?>



<?php

    include_once 'modules/module_detail/cont_detail.php';
    include_once './Connexion.php';

     Connexion::initConnexion();

    class ModDetail{

        public $controleur;

         function __construct() {
            
           $this->controleur=new ContDetail();

        }
    }

?>


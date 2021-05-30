<?php
	class Connexion{

		protected static $bdd;

		public function __construct (){
		   
		}

		public static function initConnexion(){
			$user ="root";
			$password="";
			$dns="mysql:host=localhost;dbname=skatetricks";

			self::$bdd = new PDO($dns,$user,$password);
		}
	}
	
	Connexion::initConnexion();	
?>

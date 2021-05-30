<?php
	require_once './Connexion.php';

	//chaque modèle extends connexion
	class ModeleGestion extends Connexion {

		function getAllTricksValideOuNon($validation){
			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT * FROM tricks where validation=?');
			$data = array($validation);
			$query->execute($data);
			$result = $query->fetchAll(PDO::FETCH_ASSOC); 
			return $result;
		}

		function getAllTricks(){
			$bd = Connexion::$bdd;
			$query = $bd->prepare('SELECT * FROM tricks');
			$data = array();
			$query->execute($data);
			$result = $query->fetchAll(PDO::FETCH_ASSOC); 
			return $result;
		}

		function updateValidation($validation, $id_tricks) {
			$bd = Connexion::$bdd;
			$query = $bd->prepare('UPDATE tricks SET tricks.validation = ? WHERE tricks.id_tricks=?');
			$query->execute(array($validation, $id_tricks));
		}
		
	}

?>
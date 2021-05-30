<?php


	require_once './Connexion.php';
	//chaque modèle extends connexion
	class ModeleForum extends Connexion {

		function getAllCom($id_tricks) {
			$bd = Connexion::$bdd;
			$bd->exec("set names utf8");
			$sql = "SELECT * from forum where id_tricks=?";
			$query = $bd->prepare($sql);
			$query->execute(array($id_tricks));
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		function ajoutCom($id_tricks, $commentaire, $auteur){
			try {
				$bd = Connexion::$bdd;
				$sql = "INSERT INTO forum VALUES (?, DEFAULT, ?, ?)";
				$query = $bd->prepare($sql);
				$query->execute(array($id_tricks, $commentaire, $auteur));
			} catch(PDOExpcetion $exc) {
				return false;
			}
		}


	}
?>


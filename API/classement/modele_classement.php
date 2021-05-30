<?php
	require_once './Connexion.php';

	class ModeleClassement extends Connexion {


		function getGlobalScoreUsertricks($user ) {
			$tab = $this->buildArray($user );
			$sql = $this->buildReq($user );

			try {
				$bd = Connexion::$bdd; 
				$bd->exec("set names utf8");

				$req = $bd->prepare( $sql );

				$req->execute( $tab );

				$ret = $req->fetchAll(PDO::FETCH_ASSOC);

				$bd = null;
				return $ret;

			} catch(PDOException $exc) {
				return array("Erreur" => "Une erreur est survenue... Impossible de se connecter");
			}
		}

		function buildArray($user) {
			$valeurs = array();
			( !empty($user) ? array_push( $valeurs, htmlspecialchars( "%".trim($user)."%") ) : null );

			return $valeurs;
		}

		function buildReq($user ) {
			$valeurs2 = array();
			( !empty($user) ? array_push( $valeurs2,array("user" => "%".trim($user)."%") ) : null );

			$sql = "SELECT log_user AS utilisateur, SUM(note) AS note FROM classement ";
			$sql2 = "";	

			if( !empty($valeurs2) ) {
				$sql2 .= " WHERE";

				foreach ($valeurs2 as $val) {
					if( !empty($val['user']) ) {
						$sql2 .= " log_user LIKE ? AND";
					}
				}

			}

			$sql .= substr($sql2, 0, -4)." GROUP BY log_user ORDER BY note DESC";
	
			return $sql;
		}

	}

?>
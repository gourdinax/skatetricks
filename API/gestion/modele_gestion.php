<?php
	require_once './Connexion.php';

	class ModeleGestion extends Connexion {

		function getGlobalListTricksUser( $tricks, $user, $etat ) {
			$tab = $this->buildArray( $tricks, $user, $etat );
			$sql = $this->buildReq( $tricks, $user, $etat );

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

		function buildArray( $tricks, $user, $etat ) {
			$valeurs = array();
			( !empty($user) ? array_push( $valeurs, htmlspecialchars( "%".trim($user)."%") ) : null );
			( !empty($tricks) ? array_push( $valeurs, htmlspecialchars( "%".trim($tricks)."%") ) : null );
			( !empty($etat) ? array_push( $valeurs, 1 ) : array_push( $valeurs, 0 ) );

			return $valeurs;
		}

		function buildReq( $tricks, $user, $etat ) {
			$valeurs2 = array();
			( !empty($user) ? array_push( $valeurs2,array("user" => "%".trim($user)."%") ) : null );
			( !empty($tricks) ? array_push( $valeurs2, array("tricks" => $tricks) ) : null );
			( isset($etat) ? array_push( $valeurs2, array("etat" => '1') ) : array_push( $valeurs2, array("etat" => '0') ) );

			$sql = "SELECT * FROM tricks";
			$sql2 = "";

			if( !empty($valeurs2) ) {
				$sql2 .= " WHERE";

				foreach ($valeurs2 as $val) {
					if( !empty($val['user']) ) {
						$sql2 .= " auteur LIKE ? AND";
					}
					if( !empty($val['tricks']) ) {
						$sql2 .= " id_tricks LIKE ? AND";
					}
					if( !empty($val['etat']) ) {
						$sql2 .= " validation = ? AND";
					}
				}

			}

			$sql .= substr($sql2, 0, -4)." ORDER BY id_tricks ASC";

			return $sql;
		}

	}

?>
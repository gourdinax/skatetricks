<?php
	require_once './Connexion.php';
	require_once './lib/sparql/sparqllib.php';

	class ModeleTricks extends Connexion {

		function getListeTricks($tricks) {


         $db = sparql_connect( "https://dbpedia.org/sparql" );
         if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
         sparql_ns( "rdf","http://www.w3.org/1999/02/22-rdf-syntax-ns#" );
         sparql_ns( "dbp","http://dbpedia.org/property/" );
         sparql_ns( "dbo","http://dbpedia.org/ontology/" );
         sparql_ns( "xsd","http://www.w3.org/2001/XMLSchema#" );
          
         $sparql = "SELECT DISTINCT * WHERE 
		 { 
			?s dct:subject dbc:Skateboarding_tricks .
			?s rdfs:label ?id_tricks . filter langMatches(lang(?id_tricks),'en') .
			?s dbo:abstract ?desc_tricks . filter langMatches(lang(?desc_tricks),'en') .
		 ";

		if( !empty( $tricks ) ) {
			$sparql .= " FILTER (regex(?id_tricks, '".$tricks."')) . }
			";
		}else {
			$sparql .= " } ";

		}

         $result = sparql_query( $sparql ); 
         if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
          
		 $dbRes = array();
		 while( $row = sparql_fetch_array( $result ) )
         {
           array_push($dbRes, $row);
         }
			$valeur = array(); 
			( !empty($tricks) ? array_push($valeur, htmlspecialchars( "%".trim($tricks)."%" ) ) : null );

			$sql = "SELECT * FROM tricks WHERE validation=1 ";

			if( !empty( $valeur[0] ) ) {
				$sql .= " AND id_tricks LIKE ?";
			}

			try {
				$bd = Connexion::$bdd; 
				$bd->exec("set names utf8");

				$req = $bd->prepare($sql);

				$req->execute( $valeur );
				$ret = $req->fetchAll(PDO::FETCH_ASSOC);

				$bd = null;
				
				foreach ($ret as $key) {
					array_push($dbRes, $key);
				}

			} catch(PDOException $exc) {
				return array("Erreur" => "Une erreur est survenue... Impossible de se connecter");
			}

		return $dbRes;

			
		}

	}

?>
<?php

	require_once './Connexion.php';

   	//chaque modèle extends connexion
    class ModeleTricks extends Connexion {

        function ajoutTricks($id, $description, $auteur){
            $bd = Connexion::$bdd;
            $query = $bd->prepare('INSERT INTO tricks VALUES (?, ?, DEFAULT, ?)');
            $query->execute(array($id, $description, $auteur));
        }


    }

?>


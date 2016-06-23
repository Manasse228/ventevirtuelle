<?php
include 'entite/type_vendeur.php';

   function liste_type_vendeur (){  
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_type,somme,notification,libelle_type,nb_max from type_vendeur';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetchAll();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
        }
?>

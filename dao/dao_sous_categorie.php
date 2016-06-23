<?php
include 'entite/sous_categorie.php';
function liste_par_categorie($categorie)
    {
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT * FROM sous_categorie where id_categorie='.$categorie.'';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetchAll();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
    }
   
    function get_libelle($categorie)
    {
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT * FROM sous_categorie where sous_categorie.id_sous='.$categorie.'';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetch();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
    }
    
    
?>

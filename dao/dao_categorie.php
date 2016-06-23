<?php
include 'entite/categorie.php';
function liste_all()
    {
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id,id_admin,libelle_cat from categorie';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetchAll();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
    }
    
?>

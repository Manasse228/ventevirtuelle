<?php
include 'entite/photo.php';
 function Ajouter_photo($id_pro,$id_photo,$min)
    {
           $bdd = new connexion();
           $pdo = $bdd->getconnexion();
           $req = $pdo->prepare('INSERT INTO photos (id_produit,photo,miniature) VALUES(?, ?, ?)');
           $req->execute(array($id_pro,$id_photo,$min)); 
           $req->closeCursor();
           $req = NULL;
    }
 function Liste_photo_par_produits($id_produit){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT * from photos where id_produit='.$id_produit.'';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetchAll();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
 }
 function Liste_par_produits_limite($id_produit){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT * from photos where id_produit='.$id_produit.' LIMIT 0,1';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetchAll();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
 }
?>

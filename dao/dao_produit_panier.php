<?php
function ajouter_produit_panier($id_panier,$id_produit,$quantite){
           $pdo = new connexion();
           $bdd = $pdo->getconnexion();
           $req = $bdd->prepare('INSERT INTO produit_panier (id_panier,id_produit,quantite) VALUES(? , ?, ?)');
           $req->execute(array($id_panier,$id_produit,$quantite));
           $req->closeCursor();
           $req = NULL;
}
function select_id_produit_qtte($id_panier){
     $bdd = new connexion();
     $pdo = $bdd->getconnexion();
     $query = "select produit_panier.id_produit,produit_panier.quantite,produits.id_vendeur from produit_panier,produits where id_panier ='".$id_panier."' and produits.id_produit = produit_panier.id_produit";
     $prep = $pdo->prepare($query);
     $prep->execute();
     $x = $prep->fetchAll();
     return $x;
}
?>

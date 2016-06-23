<?php
 function commande_acheteur($id_acheteur){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT * from commande where id_acheteur ="'.$id_acheteur.'" and etat_cmd=1';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetchAll();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;

        }

  function ajoute_commande($id_ccmd, $id_acheteur, $date, $montant_total, $etat)
   {
       $pdo = new connexion();
       $bdd = $pdo->getconnexion();
           $req = $bdd->prepare('INSERT INTO commande (code,id_acheteur,date_commande,montant_global,etat_cmd) VALUES(?, ?, ?, ?, ?)');
           $req->execute(array($id_ccmd,  $id_acheteur, $date,$montant_total,$etat));
           
   }

   function ajoute_produit_commande($code, $id_produit, $quantite_pr,$cbr,$etat_cbr)
   {
       $pdo = new connexion();
       $bdd = $pdo->getconnexion();
           $req = $bdd->prepare('INSERT INTO produit_de_commande (code,id_produit,quantite_pr,cbr,etat_cbr) VALUES(?, ?, ?,?,?)');
           $req->execute(array($code,$id_produit,$quantite_pr,$cbr,$etat_cbr));

   }

 function produit_commmande($id_commande){
     $bdd = new connexion();
     $pdo = $bdd->getconnexion();
     $query = "select produits.libelle,produits.prix,vendeur.nom_v,quantite_pr from produit_de_commande,vendeur,produits where produit_de_commande.code ='".$id_commande."' and produits.id_produit = produit_de_commande.id_produit and vendeur.id_vendeur = produits.id_vendeur";
     $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetchAll();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
 }
 ?>

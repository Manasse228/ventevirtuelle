<?php

function compte(){
        $pdo = new connexion();
         $bdd = $pdo->getconnexion();
         $query = "select * from cbr";
        $prep = $bdd->prepare($query);
        $prep->execute();
        $arr = $prep->rowCount();
        $prep->closeCursor();
        $prep = NULL;
        return $arr+1;
}
function cbr_commande($id_commande){
         $pdo = new connexion();
         $bdd = $pdo->getconnexion();
         $query = "select * from cbr where id_commande = '".$id_commande."' ";
        $prep = $bdd->prepare($query);
        $prep->execute();
        $arr = $prep->fetch();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
}

function cbr_verif($id_vendeur,$cbr){
         $pdo = new connexion();
         $bdd = $pdo->getconnexion();
         $query = "select produits.libelle,produit_de_commande.cbr,produit_de_commande.etat_cbr from produit_de_commande,produits,vendeur,cbr_deja
                  where produit_de_commande.id_produit = produits.id_produit
                  and produits.id_vendeur = vendeur.id_vendeur
                  and vendeur.id_vendeur = '".$id_vendeur."'
                  and produit_de_commande.cbr = cbr_deja.code
                  and cbr_deja.code = '".$cbr."'
                  and cbr_deja.etat = 0
                  and cbr_deja.id_vendeur = '".$id_vendeur."' ";
        $prep = $bdd->prepare($query);
        $prep->execute();
        $arr = $prep->fetchall();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
}

function cbr($id_acheteur,$id_commande,$date,$etat){
  $allowedCharacters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_@$%*";
  $randomKey = '';
  $length = 5;
    for($i=1;$i<= $length; $i++)
    {
        $randomKey .= $allowedCharacters[rand(0, 66)];
    }
  $code =  $randomKey.compte();
  $pdo = new connexion();
  $bdd = $pdo->getconnexion();
  $req = $bdd->prepare('INSERT INTO cbr (code,id_acheteur,id_commande,date,etat) VALUES(?, ?, ?, ?, ?)');
  $req->execute(array($code,$id_acheteur,$id_commande , $date ,$etat));
  return $code;
}
  function valide_cbr($code,$vendeur){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'UPDATE cbr_deja SET etat = 1 WHERE code ="'.$code.'" and id_vendeur = '.$vendeur.'';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $prep->closeCursor();
        $prep = NULL;
        return true;
       }
?>

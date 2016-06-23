<?php
function liste($code,$vendeur) {
     $bdd = new connexion();
     $pdo = $bdd->getconnexion();
     $query = "select * from cbr_deja where id_vendeur = ".$vendeur." and code = '".$code."'";
     $prep = $pdo->prepare($query);
     $prep->execute();
     $x = $prep->fetchAll();
     return $x;
}

function ajouter_cbr_deja($code,$vendeur)
    {
       if(!liste($code, $vendeur))
       {
           $bdd = new connexion();
           $pdo = $bdd->getconnexion();
           $req = $pdo->prepare('INSERT INTO cbr_deja (code,id_vendeur,etat) VALUES(?, ? ,?)');
           $req->execute(array($code,$vendeur,0));
           $req->closeCursor();
           $req = NULL;
       }
    }
?>

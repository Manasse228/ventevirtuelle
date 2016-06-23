<?php
function nombre(){
         $pdo = new connexion();
         $bdd = $pdo->getconnexion();
         $query = "select * from panier";
        $prep = $bdd->prepare($query);
        $prep->execute();
        $arr = $prep->rowCount();
        $prep->closeCursor();
        $prep = NULL;
        return $arr+1;
}

function ajouter_panier($date , $id_acheteur , $montant_global,$num_transaction){
           $pdo = new connexion();
           $bdd = $pdo->getconnexion();
           $code = "COMMANDE/".nombre();
           $req = $bdd->prepare('INSERT INTO panier (code,id_acheteur,Montant_global,date,num_transaction) VALUES(?, ?, ?, ?, ?)');
           $req->execute(array($code,$id_acheteur,$montant_global,$date,$num_transaction));
           $req->closeCursor();
           $req = NULL;
           return $code;
}
?>

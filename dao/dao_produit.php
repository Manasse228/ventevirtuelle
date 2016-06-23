<?php
include 'entite/produit.php';
 function nb(){ 
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT * from produits';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->rowCount();
        return $arr;
 }

    function ajouter_produit($ID_VENDEUR, $ID_SOUS, $LIBELLE, $PRIX, $QUANTITE, $CARACTERISTIQUE, $DESCRIPTION, $ETAT_A, $DATE_DE_CMD){
           $pdo = new connexion();
           $bdd = $pdo->getconnexion();
           $ID_PRODUIT = nb()+1;
           $produit = new produit($ID_PRODUIT,$ID_VENDEUR, $ID_SOUS, $LIBELLE, $PRIX, $QUANTITE, $CARACTERISTIQUE, $DESCRIPTION, $ETAT_A, $DATE_DE_CMD);
           $req = $bdd->prepare('INSERT INTO produits (id_produit,id_vendeur,id_sous,libelle,prix,quantite,caracteristique,description,etat_a,date_de_cmd) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
           $req->execute(array($ID_PRODUIT,$ID_VENDEUR,$ID_SOUS,$LIBELLE,$PRIX,$QUANTITE,$CARACTERISTIQUE,$DESCRIPTION,$ETAT_A,$DATE_DE_CMD)); 
           $req->closeCursor();
           $req = NULL;
           return $ID_PRODUIT;
 }

 function liste_produits(){ 
          $bdd = new connexion();
          $pdo = $bdd->getconnexion();
          $query = 'SELECT id_produit,sous_categorie.libelle_sous_categorie,libelle,prix,quantite,caracteristique,description,etat_a,date_de_cmd from produits,sous_categorie
                  where produits.id_sous = sous_categorie.id_sous';
          $prep = $pdo->prepare($query);
          $prep->execute();
          $arr = $prep->fetchAll();
          $prep->closeCursor();
          $prep = NULL;
          return $arr;
 }

 function verif_quantite($id){
     $bdd = new connexion();
     $pdo = $bdd->getconnexion();
     $query = "select quantite from produits where id_produit ='".$id."' ";
     $prep = $pdo->prepare($query);
     $prep->execute();
     $x = $prep->fetch();
     return $x[0];
 }
function liste_limite_produit(){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_produit,sous_categorie.libelle_sous_categorie,libelle,prix,quantite,caracteristique,description,etat_a,date_de_cmd from produits,sous_categorie
        where produits.id_sous = sous_categorie.id_sous 
        and etat_a = 1
        and quantite > 0
        ORDER BY date_de_cmd desc
        LIMIT 0,20 ';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetchAll();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
 }  
 
  function liste_PAR_VENDEUR($id_vendeur){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_produit,id_vendeur,sous_categorie.libelle_sous_categorie,libelle,prix,quantite,caracteristique,description,etat_a,date_de_cmd from produits,sous_categorie  
        where etat_a = 1 
        and id_vendeur= '.$id_vendeur.'
        and produits.id_sous = sous_categorie.id_sous
        ORDER BY date_de_cmd desc';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetchAll();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
 }
 
 function get_produit($id){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_produit,id_vendeur,sous_categorie.id_sous,sous_categorie.libelle_sous_categorie as lib_s,categorie.libelle_cat,libelle,prix,quantite,caracteristique,description,etat_a,date_de_cmd,categorie.id from produits,sous_categorie,categorie 
            where produits.id_sous = sous_categorie.id_sous 
            and sous_categorie.id_categorie = categorie.id  
            and id_produit= '.$id.'';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetch();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
 }
  function get_produit_all($id){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_produit,vendeur.nom_v,sous_categorie.id_sous,sous_categorie.libelle_sous_categorie,categorie.libelle_cat,libelle,prix,quantite,caracteristique,description,etat_a,date_de_cmd,categorie.id from produits,sous_categorie,categorie,vendeur 
            where produits.id_sous = sous_categorie.id_sous 
            and sous_categorie.id_categorie = categorie.id  
            and vendeur.id_vendeur = produits.id_vendeur
            and id_produit= '.$id.'';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetch();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
 }
   function supprimer($id_produit){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'UPDATE produits SET etat_a = 0 WHERE produits.id_produit ='.$id_produit.'';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $prep->closeCursor();
        $prep = NULL;
       }
   function actualise($id_produit,$qtte){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'UPDATE produits SET quantite = quantite-'.$qtte.' WHERE produits.id_produit ='.$id_produit.'';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $prep->closeCursor();
        $prep = NULL;
       }
    function modifier_produits($ID_PRODUIT,$ID_SOUS, $LIBELLE, $PRIX, $QUANTITE, $CARACTERISTIQUE, $DESCRIPTION){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = "UPDATE produits SET quantite = ".$QUANTITE.",prix=".$PRIX.",libelle = '".$LIBELLE."',caracteristique = '".$CARACTERISTIQUE."',description = '".$DESCRIPTION."',id_sous=".$ID_SOUS."  WHERE id_produit = ".$ID_PRODUIT."";
        $prep = $pdo->prepare($query);
        $prep->execute();
        $prep->closeCursor();
        $prep = NULL;
       }
   
  function get_produit_by_sous_catégorie($id){
        $bdd = new connexion();
       
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_produit,vendeur.nom_v,sous_categorie.id_sous,sous_categorie.libelle_sous_categorie,categorie.libelle_cat,libelle,prix,quantite,caracteristique,description,etat_a,date_de_cmd,categorie.id from produits,sous_categorie,categorie,vendeur 
            where produits.id_sous = sous_categorie.id_sous 
            and vendeur.id_vendeur = produits.id_vendeur
            and sous_categorie.id_categorie = '.$id.'';  
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetch();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
  }

  function get_produit_by_sous_catégorie_limite_sans_produit($id,$id_produit){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_produit,vendeur.nom_v,sous_categorie.id_sous,sous_categorie.libelle_sous_categorie,categorie.libelle_cat,libelle,prix,quantite,caracteristique,description,etat_a,date_de_cmd,categorie.id from produits,sous_categorie,categorie,vendeur 
            where produits.id_sous = sous_categorie.id_sous 
            and sous_categorie.id_categorie = categorie.id  
            and vendeur.id_vendeur = produits.id_vendeur
            and sous_categorie.id_sous ='.$id.'
            and id_produit<>'.$id_produit.'
            and etat_a = 1
            ORDER BY date_de_cmd asc
            LIMIT 0,12 ';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetchall();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
  }
  function get_produit_by_sous_catégorie_limite($id){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_produit,vendeur.nom_v,sous_categorie.id_sous,sous_categorie.libelle_sous_categorie,categorie.libelle_cat,libelle,prix,quantite,caracteristique,description,etat_a,date_de_cmd,categorie.id from produits,sous_categorie,categorie,vendeur 
            where produits.id_sous = sous_categorie.id_sous 
            and sous_categorie.id_categorie = categorie.id  
            and vendeur.id_vendeur = produits.id_vendeur
            and sous_categorie.id_sous ='.$id.'
            ORDER BY date_de_cmd asc';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetchall();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
  }
  ?>

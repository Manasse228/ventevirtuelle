<?php
include 'entite/vendeur.php';



   function ajouter_vendeur($ID_TYPE, $NOM_V, $DATE_C, $ETAT_V, $PASSE_V, $EMAIL_V){

      try{
       $bdd = new connexion();
       $pdo = $bdd->getconnexion();

       $pdo->beginTransaction();
       $req = $pdo->prepare("INSERT INTO vendeur(id_type,nom_v,email_v,passe_v,date_c,etat_v)
            VALUES (:type, :nom, :email, :password, :date, :etat)");

       $req->bindValue(':type', $ID_TYPE, PDO::PARAM_INT);
       $req->bindValue(':nom', $NOM_V, PDO::PARAM_STR);
       $req->bindValue(':email', $EMAIL_V, PDO::PARAM_STR);
       $req->bindValue(':password', $PASSE_V, PDO::PARAM_STR);
       $req->bindValue(':date', $DATE_C);
       $req->bindValue(':etat', $ETAT_V, PDO::PARAM_INT);

       $req->execute();

       $pdo->commit();

   }catch (Exception $ex) {
    $pdo->rollback();
    echo ' DEBUT Erreur : ' . $ex->getMessage() . '<br />';
    echo 'N° : ' . $ex->getCode();
    echo "Error: " . $req . "<br>" . $pdo->error. "FIN ";

    exit();
}


         /*  $pdo = new connexion;
           $bdd = $pdo->getconnexion();
           $venduer = new vendeur($ID_VENDEUR, $ID_TYPE, $NOM_V, $DATE_C, $ETAT_V, $PASSE_V, $NUMERO_TEL_V, $NUMERO_MOBIL_V, $EMAIL_V);
           $req = $bdd->prepare('INSERT INTO vendeur (id_type, nom_v, date_c, etat_v, passe_v, numero_tel_v, numero_mobil_v, email_v) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
           $req->execute(array($ID_TYPE,  $NOM_V, $DATE_C,$ETAT_V,$PASSE_V,$NUMERO_TEL_V,$NUMERO_MOBIL_V,$EMAIL_V)); */
    
           }
    function exist_vendeur($mail){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_vendeur from vendeur where email_v ="'.$mail.'"';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->rowCount();
        $prep->closeCursor();
        $prep = NULL;
        if ($arr){
            return true;
        }
        else{
            return false;
        }
    }
    function get_id($mail){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_vendeur from vendeur where email_v ="'.$mail.'"';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetch();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
    }
    function get_vendeur($id){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_vendeur,nom_v,nb_max from vendeur,type_vendeur where id_vendeur="'.$id.'" 
                  and type_vendeur.id_type = vendeur.id_type ';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetchall();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
    }
    function get_boutique(){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_vendeur,nom_v,nb_max from vendeur,type_vendeur where 
            vendeur.id_type = type_vendeur.id_type
            and type_vendeur.libelle_type = "Boutique"' ;
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetchAll();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
    } 
    function verif_compte_v($mail,$passe){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_vendeur,nom_v from vendeur where email_v ="'.$mail.'" and passe_v = "'.$passe.'"';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arrr = $prep->fetch();
        $prep->closeCursor();
        $prep = NULL;
        return $arrr;
        
        }
?>

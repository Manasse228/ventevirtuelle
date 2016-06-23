<?php
   include 'entite/acheteur.php';
   
   function ajoute_a($nom, $email, $pwd, $date, $etat){

       try {

           $bdd = new connexion();
           $pdo = $bdd->getconnexion();

           $pdo->beginTransaction();
           $req = $pdo->prepare("INSERT INTO acheteur(nom,email,passe,date,etat, argent)
            VALUES (:nom, :email, :password, :date, :etat, 5000)");

           $req->bindValue(':nom', $nom, PDO::PARAM_STR);
           $req->bindValue(':email', $email, PDO::PARAM_STR);
           $req->bindValue(':password', $pwd, PDO::PARAM_STR);
           $req->bindValue(':date', $date);
           $req->bindValue(':etat', $etat, PDO::PARAM_INT);

           $req->execute();

           $pdo->commit();

       }catch (Exception $ex) {
           $pdo->rollback();
           echo ' DEBUT Erreur : ' . $ex->getMessage() . '<br />';
           echo 'N° : ' . $ex->getCode();
           echo "Error: " . $req . "<br>" . $pdo->error. "FIN ";

           exit();
       }

   }





    function exist_acheteur($mail){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_a from acheteur where email ="'.$mail.'"';
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
        function get_id_a($mail){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_a from acheteur where email="'.$mail.'"';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetch();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
    }
        function verif_compte($mail,$passe){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_a,nom from acheteur where email ="'.$mail.'" and passe = "'.$passe.'"';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arrr = $prep->fetch();
        $prep->closeCursor();
        $prep = NULL;
        return $arrr;
    }
       function get_acheteur($id){
        $bdd = new connexion();
        $pdo = $bdd->getconnexion();
        $query = 'SELECT id_a,nom,numero_mobil from acheteur where id_a="'.$id.'"';
        $prep = $pdo->prepare($query);
        $prep->execute();
        $arr = $prep->fetchAll();
        $prep->closeCursor();
        $prep = NULL;
        return $arr;
    }
?>

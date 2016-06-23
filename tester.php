<?php
session_start();
include 'dao/dao_panier_bd.php';
include 'dao/dao_panier.php';
include 'dao/dao_produit_panier.php';
include 'entite/connection.php';
if(isset ($_GET['valider'])){
     for($j=0;$j<nbr();$j++){
        $combo = 'combo'.$j;
        modif_qte($_SESSION['panier']['id_article'][$j],$_GET[$combo]);
     }
               include 'fonction.php';
               $mail="msamie33@gmail.com";
               $pass="marc";
               $ipc="TG120910112516";
               $url="http://41.207.172.98/lion/achat/achat/ajout?ipc=$ipc&mail=$mail&pass=$pass";
               $resultat= curl($url);
                if($resultat>0){
                    $montant_total = montant_panier();
                    if (!isset ($_SESSION['id']))
                    {
                      $id_ach = -1;
                    }else if ($_SESSION['type']=="acheteur")
                        {
                        $id_ach = $_SESSION['id'];
                        }
                    $id_panier = ajouter_panier(date('Y-m-d'),$id_ach,  montant_panier(), $resultat);
                    for($i=0;$i<nbr();$i++){
                        ajouter_produit_panier($id_panier,$_SESSION['panier']['id_article'][$i],$_SESSION['panier']['qte'][$i]);
                        $_SESSION['code']= $id_panier;

                        }
                    $lib=$id_panier; //Libellé de l'achat
                    $mtn=$montant_total; // Montant de l'achat
                    $dev="CFA"; // Devise de l'achat
                    $urlf="http://41.207.172.98/assiganme/merci.php"; // Url de redirection à la fin de la transaction
                    $url1="http://41.207.172.98/assiganme/desole.php"; // Url de redirection en cas d'annulation
                    $urlr="http://41.207.172.98/assiganme/traitement.php"; // Url du fichier vers lequel Lion enverra les requêtes pour informer sur l'état de la transaction
                    $url="http://41.207.172.98/lion/achat/achat/debutAchat?ipc=$ipc&mail=$mail&pass=$pass&Ntrans=$resultat&lib=$lib&mtn=$mtn&dev=$dev&urlretour=$url1&urlfichier=$urlr&urlfin=$urlf";
                    
                    $script = curl($url);


                }
   echo $script;
}
?>

<?php
echo 'ok';
include 'entite/connection.php';
session_start();
include 'dao/dao_cbr.php';
$id_acheteur = -1;
$cbr = cbr($id_acheteur,$_SESSION['code'], date('Y-m-d'), 0);
//        include 'dao/dao_panier.php';
//        include 'dao/dao_sous_categorie.php';
//        include 'dao/dao_categorie.php';
//        include 'entite/connection.php';
//        include 'dao/dao_acheteur.php';
//        include 'dao/dao_vendeur.php';
//        include 'dao/dao_produit.php';
//        include 'dao/dao_photo.php';
//        include 'fonction.php';
//        include 'dao/dao_cbr.php';
//        include 'dao/dao_commande.php';
//        include 'dao/dao_produit_panier.php';
//        session_start();
//if( isset($_GET["numetape"]) && ($_GET["numetape"]==13)  ){
//
//        require ("enlever_stock.php");
//         if (!isset ($_SESSION['id']))
//                    {
//                      $id_acheteur = -1;
//                    }else if ($_SESSION['type']=="acheteur")
//                        {
//                        $id_acheteur = $_SESSION['id'];
//                        }
//        $cbr = cbr($id_acheteur,$_SESSION['code'], date('Y-m-d'), 0);
//        vider_panier();
//        $ach = get_acheteur($id_acheteur);
//        $script = curl('http://195.43.44.45/SMSsend?number=228'.$ach[0][2].'&user=1173617&pass=c7dsp7dy&message=Votre+achat+éffectuez+avec+succes+++CBR='.$cbr.'&ownnum=DEKON&type=LongSMS');
//           }

?>
<?php
    $id_panier = $_SESSION['code'];
    $arra = select_id_produit_qtte($id_panier);
    $montant_total = montant_panier();
    $date = date('Y-m-d');

                    if (!isset ($_SESSION['id']))
                    {
                      $id_acheteur = -1;
                    }else if ($_SESSION['type']=="acheteur")
                        {
                        $id_acheteur = $_SESSION['id'];
                        }

    ajoute_commande($_SESSION['code'],$id_acheteur,$date,$montant_total,1);
    $cbr = cbr($id_acheteur,$_SESSION['code'], date('Y-m-d'), 0);
    
    foreach ($arra as $arra){
    actualise($arra[0], $arra[1]);
    ajoute_produit_commande($_SESSION['code'], $arra[0], $arra[1],$cbr,0);
    ajouter_cbr_deja($cbr,$arra[2]);

                          }?>

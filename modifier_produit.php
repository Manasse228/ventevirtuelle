<?php
include 'dao/dao_produit.php';
include 'entite/connection.php';
session_start();
$ID_PRODUIT = $_POST['id'];
$ID_SOUS = $_POST['SOUS'];
$LIBELLE = $_POST['produit'];
$PRIX = $_POST['prix'];
$QUANTITE = $_POST['quantite'];
$CARACTERISTIQUE = $_POST['caracteristique'];
$DESCRIPTION = $_POST['description'];

modifier_produits($ID_PRODUIT, $ID_SOUS, mysql_real_escape_string($LIBELLE), $PRIX, $QUANTITE, mysql_real_escape_string($CARACTERISTIQUE),  mysql_real_escape_string($DESCRIPTION));
header('location:vendeur.php?k='.$_SESSION['id'].'');
?>

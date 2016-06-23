<?php
session_start();
require'dao/dao_produit.php';
require 'entite/connection.php';
$id = $_GET['id'];
supprimer($id);
header('location:vendeur.php?k='.$_SESSION['id'].'' );
?>

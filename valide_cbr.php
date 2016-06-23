<?php
include 'dao/dao_cbr.php';
include 'entite/connection.php';
include 'dao/dao_cbr_deja.php';
session_start();
 if(valide_cbr($_GET['key'],$_SESSION['id']))
header('location:vendeur.php?k='.$_SESSION["id"].'&cp=true');
?>

<?php
session_start();
include 'dao/dao_panier.php';
modif_qte($_GET['id'],$_GET['qtte']);
header("location:liste_panier.php");

?>

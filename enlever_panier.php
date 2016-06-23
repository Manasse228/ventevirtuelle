<?php

session_start();
include 'dao/dao_panier.php';
$ref_article = $_GET['k'];
supprim_article($ref_article);
 if(nbr ()==0){
     vider_panier();
 }
header("location:liste_panier.php")
?>

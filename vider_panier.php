<?php
  include 'dao/dao_panier.php';
  session_start();
  echo vider_panier();
  header("location:index.php")
?>

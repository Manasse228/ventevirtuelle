<?php
session_start();
include 'dao/dao_cbr.php';
include 'entite/connection.php';

$arr = cbr_verif($_SESSION['id'],$_POST['cbr']);
 if((!($arr))||($_POST['cbr']==""))
 {
   echo  $erreur = "Votre cbr n'a pas été reconnu est à été déja utilisé";
   header("location:vendeur.php?k=".$_SESSION['id']."&verif=false");
 }
 else
 {
     header("location:vendeur.php?k=".$_SESSION['id']."&verif=true&cbr=".$_POST['cbr']."");
     var_dump($arr);
 }
?>

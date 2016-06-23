<?php

class photo{
 private $id_produit;
 private $photo;
 
 function __construct($id_produit, $photo) {
     $this->id_produit = $id_produit;
     $this->photo = $photo;
 }
 
 public function getId_produit() {
     return $this->id_produit;
 }

 public function getPhoto() {
     return $this->photo;
 }

 public function setId_produit($id_produit) {
     $this->id_produit = $id_produit;
 }

 public function setPhoto($photo) {
     $this->photo = $photo;
 }



 }
?>

<?php

class produit {
 private $ID_PRODUIT;
 private $ID_VENDEUR;
 private $ID_SOUS;
 private $LIBELLE;
 private $PRIX;
 private $QUANTITE;
 private $CARACTERISTIQUE;
 private $DESCRIPTION;
 private $ETAT_A;
 private $DATE_DE_CMD;
 
 function __construct($ID_PRODUIT, $ID_VENDEUR, $ID_SOUS, $LIBELLE, $PRIX, $QUANTITE, $CARACTERISTIQUE, $DESCRIPTION, $ETAT_A, $DATE_DE_CMD) {
     $this->ID_PRODUIT = $ID_PRODUIT;
     $this->ID_VENDEUR = $ID_VENDEUR;
     $this->ID_SOUS = $ID_SOUS;
     $this->LIBELLE = $LIBELLE;
     $this->PRIX = $PRIX;
     $this->QUANTITE = $QUANTITE;
     $this->CARACTERISTIQUE = $CARACTERISTIQUE;
     $this->DESCRIPTION = $DESCRIPTION;
     $this->ETAT_A = $ETAT_A;
     $this->DATE_DE_CMD = $DATE_DE_CMD;
     
 
 }
 
 public function getID_PRODUIT() {
     return $this->ID_PRODUIT;
 }

 public function getID_VENDEUR() {
     return $this->ID_VENDEUR;
 }

 public function getID_SOUS() {
     return $this->ID_SOUS;
 }

 public function getLIBELLE() {
     return $this->LIBELLE;
 }

 public function getPRIX() {
     return $this->PRIX;
 }

 public function getQUANTITE() {
     return $this->QUANTITE;
 }

 public function getCARACTERISTIQUE() {
     return $this->CARACTERISTIQUE;
 }

 public function getDESCRIPTION() {
     return $this->DESCRIPTION;
 }

 public function getETAT_A() {
     return $this->ETAT_A;
 }

 public function getDATE_DE_CMD() {
     return $this->DATE_DE_CMD;
 }

 public function setID_PRODUIT($ID_PRODUIT) {
     $this->ID_PRODUIT = $ID_PRODUIT;
 }

 public function setID_VENDEUR($ID_VENDEUR) {
     $this->ID_VENDEUR = $ID_VENDEUR;
 }

 public function setID_SOUS($ID_SOUS) {
     $this->ID_SOUS = $ID_SOUS;
 }

 public function setLIBELLE($LIBELLE) {
     $this->LIBELLE = $LIBELLE;
 }

 public function setPRIX($PRIX) {
     $this->PRIX = $PRIX;
 }

 public function setQUANTITE($QUANTITE) {
     $this->QUANTITE = $QUANTITE;
 }

 public function setCARACTERISTIQUE($CARACTERISTIQUE) {
     $this->CARACTERISTIQUE = $CARACTERISTIQUE;
 }

 public function setDESCRIPTION($DESCRIPTION) {
     $this->DESCRIPTION = $DESCRIPTION;
 }

 public function setETAT_A($ETAT_A) {
     $this->ETAT_A = $ETAT_A;
 }

 public function setDATE_DE_CMD($DATE_DE_CMD) {
     $this->DATE_DE_CMD = $DATE_DE_CMD;
 }



 
}
?>

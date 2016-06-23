<?php
class vendeur{
    private $ID_VENDEUR;
    private $ID_TYPE;
    private $NOM_V;
    private $DATE_C;
    private $ETAT_V;
    private $PASSE_V;
    private $NUMERO_TEL_V;
    private $NUMERO_MOBIL_V;
    private $EMAIL_V;
    
    function __construct($ID_VENDEUR, $ID_TYPE, $NOM_V, $DATE_C, $ETAT_V, $PASSE_V, $NUMERO_TEL_V, $NUMERO_MOBIL_V, $EMAIL_V) {
        $this->ID_VENDEUR = $ID_VENDEUR;
        $this->ID_TYPE = $ID_TYPE;
        $this->NOM_V = $NOM_V;
        $this->DATE_C = $DATE_C;
        $this->ETAT_V = $ETAT_V;
        $this->PASSE_V = $PASSE_V;
        $this->NUMERO_TEL_V = $NUMERO_TEL_V;
        $this->NUMERO_MOBIL_V = $NUMERO_MOBIL_V;
        $this->EMAIL_V = $EMAIL_V;
    }

    public function getID_VENDEUR() {
        return $this->ID_VENDEUR;
    }

    public function getID_TYPE() {
        return $this->ID_TYPE;
    }

    public function getNOM_V() {
        return $this->NOM_V;
    }

    public function getDATE_C() {
        return $this->DATE_C;
    }

    public function getETAT_V() {
        return $this->ETAT_V;
    }

    public function getPASSE_V() {
        return $this->PASSE_V;
    }

    public function getNUMERO_TEL_V() {
        return $this->NUMERO_TEL_V;
    }

    public function getNUMERO_MOBIL_V() {
        return $this->NUMERO_MOBIL_V;
    }

    public function getEMAIL_V() {
        return $this->EMAIL_V;
    }

    public function setID_VENDEUR($ID_VENDEUR) {
        $this->ID_VENDEUR = $ID_VENDEUR;
    }

    public function setID_TYPE($ID_TYPE) {
        $this->ID_TYPE = $ID_TYPE;
    }

    public function setNOM_V($NOM_V) {
        $this->NOM_V = $NOM_V;
    }

    public function setDATE_C($DATE_C) {
        $this->DATE_C = $DATE_C;
    }

    public function setETAT_V($ETAT_V) {
        $this->ETAT_V = $ETAT_V;
    }

    public function setPASSE_V($PASSE_V) {
        $this->PASSE_V = $PASSE_V;
    }

    public function setNUMERO_TEL_V($NUMERO_TEL_V) {
        $this->NUMERO_TEL_V = $NUMERO_TEL_V;
    }

    public function setNUMERO_MOBIL_V($NUMERO_MOBIL_V) {
        $this->NUMERO_MOBIL_V = $NUMERO_MOBIL_V;
    }

    public function setEMAIL_V($EMAIL_V) {
        $this->EMAIL_V = $EMAIL_V;
    }


}
?>

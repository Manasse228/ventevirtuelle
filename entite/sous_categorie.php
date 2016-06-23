<?php

class sous_categorie{
    private $ID;
    private $ID_CATEGORIE;
    private $LIBELLE_SOUS_CATEGORIE;
    
    function __construct($ID, $ID_CATEGORIE, $LIBELLE_SOUS_CATEGORIE) {
        $this->ID = $ID;
        $this->ID_CATEGORIE = $ID_CATEGORIE;
        $this->LIBELLE_SOUS_CATEGORIE = $LIBELLE_SOUS_CATEGORIE;
    }

    public function getID() {
        return $this->ID;
    }

    public function getID_CATEGORIE() {
        return $this->ID_CATEGORIE;
    }

    public function getLIBELLE_SOUS_CATEGORIE() {
        return $this->LIBELLE_SOUS_CATEGORIE;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function setID_CATEGORIE($ID_CATEGORIE) {
        $this->ID_CATEGORIE = $ID_CATEGORIE;
    }

    public function setLIBELLE_SOUS_CATEGORIE($LIBELLE_SOUS_CATEGORIE) {
        $this->LIBELLE_SOUS_CATEGORIE = $LIBELLE_SOUS_CATEGORIE;
    }


}
?>

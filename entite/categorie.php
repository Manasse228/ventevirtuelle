<?php
class categorie{
    private $ID;
    private $ID_ADMIN;
    private $LIBELLE_CAT;
    function __construct($ID, $ID_ADMIN, $LIBELLE_CAT) {
        $this->ID = $ID;
        $this->ID_ADMIN = $ID_ADMIN;
        $this->LIBELLE_CAT = $LIBELLE_CAT;
    }
    
    public function getID() {
        return $this->ID;
    }

    public function getID_ADMIN() {
        return $this->ID_ADMIN;
    }

    public function getLIBELLE_CAT() {
        return $this->LIBELLE_CAT;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function setID_ADMIN($ID_ADMIN) {
        $this->ID_ADMIN = $ID_ADMIN;
    }

    public function setLIBELLE_CAT($LIBELLE_CAT) {
        $this->LIBELLE_CAT = $LIBELLE_CAT;
    }



}
?>

<?php
class type_vendeur {
        private $ID_TYPE;
        private $SOMME;
        private $NOTIFICATION;
        private $LIBELLE_TYPE;
        private $NB_MAX;
        
        function __construct($ID_TYPE, $SOMME, $NOTIFICATION, $LIBELLE_TYPE, $NB_MAX) {
            $this->ID_TYPE = $ID_TYPE;
            $this->SOMME = $SOMME;
            $this->NOTIFICATION = $NOTIFICATION;
            $this->LIBELLE_TYPE = $LIBELLE_TYPE;
            $this->NB_MAX = $NB_MAX;
        }
       
        public function getID_TYPE() {
            return $this->ID_TYPE;
        }

        public function getSOMME() {
            return $this->SOMME;
        }

        public function getNOTIFICATION() {
            return $this->NOTIFICATION;
        }

        public function getLIBELLE_TYPE() {
            return $this->LIBELLE_TYPE;
        }

        public function getNB_MAX() {
            return $this->NB_MAX;
        }

        public function setID_TYPE($ID_TYPE) {
            $this->ID_TYPE = $ID_TYPE;
        }

        public function setSOMME($SOMME) {
            $this->SOMME = $SOMME;
        }

        public function setNOTIFICATION($NOTIFICATION) {
            $this->NOTIFICATION = $NOTIFICATION;
        }

        public function setLIBELLE_TYPE($LIBELLE_TYPE) {
            $this->LIBELLE_TYPE = $LIBELLE_TYPE;
        }

        public function setNB_MAX($NB_MAX) {
            $this->NB_MAX = $NB_MAX;
        }


    
}
?>

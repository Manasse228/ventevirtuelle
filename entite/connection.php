<?php

class connexion
{
    function getconnexion()
    {
        /*   $serveur =  "mysql.info.unicaen.fr";
         $dbname =  "21416699_9";
         $user = "21416699";
         $password = "xohtheghooghohku";*/

        $serveur = "localhost";
        $dbname = "boutique";
        $user = "root";
        $password = "Serge1992";


        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=' . $serveur . ';dbname=' . $dbname . '', $user, $password, $pdo_options);
        return $bdd;
    }
}

?>

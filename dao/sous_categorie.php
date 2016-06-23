<?php
$serveur = "localhost";
$admin   = "root";
$mdp     = "";
$base    = "test";
/* Requ�te SQL de r�cup�ration des donn�es de la premi�re liste */
$sql = "SELECT `id` AS idr, `libelle_cat` ".
       "FROM `categorie` ".
       "ORDER BY `id`;";
/* Connexion et ex�cution de la requ�te */
$connexion = mysql_connect($serveur, $admin, $mdp);
if($connexion != false)
{
    $choixbase = mysql_select_db($base, $connexion);
    $recherche = mysql_query($sql, $connexion);
    /* Cr�ation du tableau PHP des valeurs r�cup�r�es */
    $regions = array();
    /* Index du d�partement par tableau r�gional */
    $id = 0;
    while($ligne = mysql_fetch_assoc($recherche))
    {
        $regions[$ligne['idr']] = $ligne['libelle_cat'];
    }
}
?>
<?php

$serveur = "localhost";
$admin   = "root";
$mdp     = "";
$base    = "test";

/* On r�cup�re l'identifiant de la r�gion choisie. */
$idr = isset($_GET['idr']) ? $_GET['idr'] : false;
/* Si on a une r�gion, on proc�de � la requ�te */
if(false !== $idr)
{
    /* C�ration de la requ�te pour avoir les d�partements de cette r�gion */
    $sql2 = "SELECT `id_sous`, `libelle_sous_categorie`".
            " FROM `sous_categorie`".
            " WHERE `id_categorie` = ". $idr ."".
            " ORDER BY `id_sous`;";
    $connexion = mysql_connect($serveur, $admin, $mdp);
    mysql_select_db($base, $connexion);
    $rech_dept = mysql_query($sql2, $connexion);
    /* Un petit compteur pour les d�partements */
    $nd = 0;
    /* On cr�e deux tableaux pour les num�ros et les noms des d�partements */
    $code_dept = array();
    $nom_dept = array();
    /* On va mettre les num�ros et noms des d�partements dans les deux tableaux */
    while(false != ($ligne_dept = mysql_fetch_assoc($rech_dept)))
    {
        $code_dept[] = $ligne_dept['id_sous'];
        $nom_dept[]  = $ligne_dept['libelle_sous_categorie'];
        $nd++;
    }
    /* Maintenant on peut construire la liste d�roulante */
    $liste = "";
    $liste .= '<select name="SOUS" id="SOUS" class="input-large">'."\n";
    for($d = 0; $d < $nd; $d++)
    {
        $liste .= '  <option value="'. $code_dept[$d] .'" selected>'. htmlentities($nom_dept[$d]) .'</option>'."\n";
    }
    $liste .= '</select>'."\n";
    /* Un petit coup de balai */
    mysql_free_result($rech_dept);
    /* Affichage de la liste d�roulante */
    echo($liste);
}
/* Sinon on retourne un message d'erreur */
else
{
    echo("<p>Une erreur s'est produite. La r�gion s�lectionn�e comporte une donn�e invalide.</p>\n");
}
?>
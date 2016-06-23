
<?php

function curl($url){

    $ch = curl_init($url);

    // Retourne directement le transfert sous forme de chaîne de la valeur retournée par curl_exec() au lieu de l'afficher directement.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // On lance l'exécution de la requête URL et on récupère le résultat dans une variable
    $resultat = curl_exec($ch);

    // S'il y a une erreur, on affiche un message d'erreur.
    if (!$resultat)
    {
        $resultat = "Erreur lors de l'envoie. Veuillez réessayer";

    }
    else // S'il s'est exécuté correctement, on effectue les traitements...
    {

        $resultat = trim($resultat) ;


    }
    // On ferme notre session cURL.
    curl_close($ch);

    return $resultat;
}

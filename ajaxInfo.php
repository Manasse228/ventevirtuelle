<?php
include 'entite/connection.php';

if (isset($_POST['get_option'])) {

    $bdd = new connexion();
    $pdo = $bdd->getconnexion();
    $query = "SELECT id_sous, libelle_sous_categorie from sous_categorie where id_categorie='".$_POST['get_option']."' ";

    $prep = $pdo->query($query);

    $tab = $prep->fetchAll();

    foreach ($tab as $arr) {
        echo '<option value="' . $arr[0] . '">' . $arr[1] . '</option>';
    }

    exit;
}

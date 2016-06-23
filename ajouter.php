<?php
include 'dao/dao_produit.php';
include 'entite/connection.php';
include 'dao/dao_photo.php';
session_start();
$_SESSION['id'];
$DATE_DE_CMD = date("Y-m-d H:i:s");
$ID_VENDEUR = $_SESSION['id'];
$ID_SOUS = 1;
$LIBELLE = $_POST['produit'];
$PRIX = $_POST['prix'];
$QUANTITE  = $_POST['quantite'];
$CARACTERISTIQUE = $_POST['caracteristique'];
$DESCRIPTION = $_POST['description'];
$ETAT_A = 1;
$ID_SOUS = $_POST['SOUS'];
if(isset($LIBELLE)){
   $idd = ajouter_produit($ID_VENDEUR, $ID_SOUS, $LIBELLE, $PRIX, $QUANTITE, $CARACTERISTIQUE, $DESCRIPTION, $ETAT_A, $DATE_DE_CMD);
  
if ($_FILES['image1']['name']!=""){
$MAX_FILE_SIZE = 2150000;
$folder = 'photos/';
$allowed_types = array("image/bmp", "image/gif", "image/pjpeg", "image/jpeg", "image/jpg", "multipart/x-zip", "video/msvideo");
$fname =  time()."im1.".$extension_upload = strtolower(substr(  strrchr($_FILES['image1']['name'], '.')  ,1));
time_sleep_until(time()+1);
$ftype = $_FILES['image1']['type'];
$fsize = $_FILES['image1']['size'];
$ftmp = $_FILES['image1']['tmp_name'];
if(!in_array($ftype, $allowed_types)){$error = 1;}
    if($fsize > $MAX_FILE_SIZE){$error = 2;}
        if(file_exists($folder."m_".$fname)){$error = 3;}
            if(copy($ftmp,''.$folder.''.$fname.'')) {$error = 0;}
            
                switch($error){
case'0':
echo("Fichier correctement envoyé.");
$source = imagecreatefromjpeg("photos/".$fname);
$destination = imagecreatetruecolor(250,250); 
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagejpeg($destination, "photos/mini_".$fname);
$fmin ="mini_".$fname;
Ajouter_photo($idd,$fname,$fmin);
break;
case'1':
echo("Format de fichier incorrecte.");
break;
case'2':
echo("Fichier trop volumineux.");
break;
case'3':
echo("Fichier déjà existant.");
break;
}
}
if ($_FILES['image2']['name']!=""){
$MAX_FILE_SIZE = 2150000;
$folder = 'photos/';
$allowed_types = array("image/bmp", "image/gif", "image/pjpeg", "image/jpeg", "image/jpg", "multipart/x-zip", "video/msvideo");
$fname =  time()."im2.".$extension_upload = strtolower(substr(  strrchr($_FILES['image2']['name'], '.')  ,1));
$ftype = $_FILES['image2']['type'];
$fsize = $_FILES['image2']['size'];
$ftmp = $_FILES['image2']['tmp_name'];
if(!in_array($ftype, $allowed_types)){$error = 1;}
    if($fsize > $MAX_FILE_SIZE){$error = 2;}
        if(file_exists($folder."m_".$fname)){$error = 3;}
            if(copy($ftmp,''.$folder.''.$fname.'')) {$error = 0;}
            
                switch($error){
case'0':
echo("Fichier correctement envoyé.");
$source = imagecreatefromjpeg("photos/".$fname);
$destination = imagecreatetruecolor(250,250);  
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagejpeg($destination, "photos/mini_".$fname);
$fmin ="mini_".$fname;
Ajouter_photo($idd,$fname,$fmin);
break;
case'1':
echo("Format de fichier incorrecte.");
break;
case'2':
echo("Fichier trop volumineux.");
break;
case'3':
echo("Fichier déjà existant.");
break;
}
}
if ($_FILES['image3']['name']!=""){
$MAX_FILE_SIZE = 2150000;
$folder = 'photos/';
$allowed_types = array("image/bmp", "image/gif", "image/pjpeg", "image/jpeg", "image/jpg", "multipart/x-zip", "video/msvideo");
$fname =  time()."im3.".$extension_upload = strtolower(substr(  strrchr($_FILES['image3']['name'], '.')  ,1));
$ftype = $_FILES['image3']['type'];
$fsize = $_FILES['image3']['size'];
$ftmp = $_FILES['image3']['tmp_name'];
if(!in_array($ftype, $allowed_types)){$error = 1;}
    if($fsize > $MAX_FILE_SIZE){$error = 2;}
        if(file_exists($folder."m_".$fname)){$error = 3;}
            if(copy($ftmp,''.$folder.''.$fname.'')) {$error = 0;}

                switch($error){
case'0':
echo("Fichier correctement envoyé.");
$source = imagecreatefromjpeg("photos/".$fname);
$destination = imagecreatetruecolor(250,250);  
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagejpeg($destination, "photos/mini_".$fname);
$fmin ="mini_".$fname;
Ajouter_photo($idd,$fname,$fmin);
break;
case'1':
echo("Format de fichier incorrecte.");
break;
case'2':
echo("Fichier trop volumineux.");
break;
case'3':
echo("Fichier déjà existant.");
break;
}
}
if($_FILES['image4']['name']!=""){
$MAX_FILE_SIZE = 2150000;
$folder = 'photos/';
$allowed_types = array("image/bmp", "image/gif", "image/pjpeg", "image/jpeg", "image/jpg", "multipart/x-zip", "video/msvideo");
$fname =  time()."im4.".$extension_upload = strtolower(substr(  strrchr($_FILES['image4']['name'], '.')  ,1));
$ftype = $_FILES['image4']['type'];
$fsize = $_FILES['image4']['size'];
$ftmp = $_FILES['image4']['tmp_name'];
if(!in_array($ftype, $allowed_types)){$error = 1;}
    if($fsize > $MAX_FILE_SIZE){$error = 2;}
        if(file_exists($folder."m_".$fname)){$error = 3;}
            if(copy($ftmp,''.$folder.''.$fname.'')) {$error = 0;}
            
                switch($error){
case'0':
echo("Fichier correctement envoyé.");
$source = imagecreatefromjpeg("photos/".$fname);
$destination = imagecreatetruecolor(250,250);  
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagejpeg($destination, "photos/mini_".$fname);
$fmin ="mini_".$fname;
Ajouter_photo($idd,$fname,$fmin);
break;
case'1':
echo("Format de fichier incorrecte.");
break;
case'2':
echo("Fichier trop volumineux.");
break;
case'3':
echo("Fichier déjà existant.");
break;
}
}

}
header('location:vendeur.php?k='.$ID_VENDEUR.'');
?>

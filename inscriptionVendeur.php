<?php
include 'header.php';
include 'dao/dao_panier.php';
include 'dao/dao_sous_categorie.php';
include 'dao/dao_categorie.php';
include 'entite/connection.php';
include 'dao/dao_acheteur.php';
include 'dao/dao_vendeur.php';
include 'dao/dao_produit.php';
include 'dao/dao_photo.php';
require 'dao/dao_type_vendeur.php';

if (($_SERVER['REQUEST_METHOD'] == "POST") && ($_POST["inscription"] == "submit")
    && (isset($_POST['nom'])) && (isset($_POST['email'])) && (isset($_POST['pwd']))
) {

    //on vérifie si ce mail existe déja
    if (exist_vendeur($_POST['email']) && $_POST['email']="") {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $err = "erreur";
        $info = "Ce mail a été déja utilisé pour enregistrer un vendeur";
    } else {
        ajouter_vendeur($_POST['type'], $_POST['nom'], date("Y-m-d"), 1, $_POST['passe'], $_POST['email']);
        $id = get_id($_POST['email']);
       // header('location:vendeur.php?k=' . $id[0] . '');
        header('Location:afterInscription.php');

    }
} else {
    $info = "";
    $err = "";
    $nom = "";
    $email = "";
}
?>
    <!--  start page-heading -->
    <div id="page-heading">
        <ul class="breadcrumb" style="width: 1190px">
            <li class="active"><a href="index.php">ACCUEIL</a> <span class="divider">/</span></li>
            <li class="active"><a href="inscription.php">INSCRIPTION</a> <span class="divider">/</span></li>
            <li class="active">INSCRIPTION VENDEUR</li>
        </ul>
    </div>
    <!-- end page-heading -->

    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
        <tr>
            <th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt=""/>
            </th>
            <th class="topleft"></th>
            <td id="tbl-border-top">&nbsp;</td>
            <th class="topright"></th>
            <th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt=""/>
            </th>
        </tr>
        <tr>
            <td id="tbl-border-left"></td>
            <td>
                <!--  start content-table-inner ...................................................................... START -->
                <div id="content-table-inner">

                    <!--  start table-content  -->
                    <div id="table-content" style="width: 1200px;">
                        <?php include 'menu_gauche.php'; ?>
                        <fieldset style="float: left;width: 740px;border: solid black 1px;margin-right: 10px">
                            <fieldset style="width: 740px;border: none;">
                                <?php if (!($info)) { ?>
                                    <div class="alert alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <h4>Inscrivez-vouz!</h4>

                                    </div>
                                <?php } ?>
                                <?php if ($info) { ?>
                                    <div class="alert alert-error">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <h4>Erreur!</h4>
                                        <?php echo $info; ?>
                                    </div>
                                <?php } ?>
                                <form class="form-horizontal" method="post" action="inscriptionVendeur.php">


                                    <div class="control-group">
                                        <strong class="control-label" for="Nom">Nom</strong>
                                        <div class="input-prepend" style="margin-left: 20px">
                                            <span class="add-on"><i class="icon-user"></i></span><input
                                                class="input-large" type="text" placeholder="Votre nom" name="nom"
                                                id="nom" value="<?php echo $nom ?>" required autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <strong class="control-label" for="inputEmail">E-mail</strong>
                                        <div class="input-prepend" style="margin-left: 20px">
                                            <span class="add-on"><i class="icon-envelope"></i></span><input
                                                class="input-large" type="text" placeholder="Votre adresse mail"
                                                name="email" id="email" required autocomplete="off"
                                                value="<?php echo $email ?>">

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <strong class="control-label" for="inputpasse">Mots de passe</strong>
                                        <div class="input-prepend" style="margin-left: 20px">
                                            <span class="add-on"><i class="icon-lock"></i></span><input
                                                class="input-large" type="password" name="pwd" id="passe"
                                                required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <strong class="control-label" for="inputcpasse">Confirmez !</strong>
                                        <div class="input-prepend" style="margin-left: 20px">
                                            <span class="add-on"><i class="icon-lock"></i></span><input
                                                class="input-large" type="password" name="cpasse" id="cpasse"
                                                required autocomplete="off">
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <strong class="control-label" for="inputcpasse">Type</strong>
                                        <div class="input-prepend" style="margin-left: 20px">
                                            <select type="" name="type">

                                                <?php
                                                $arr = liste_type_vendeur();
                                                foreach ($arr as $arr) {
                                                    echo '<option value="' . $arr[0] . '">' . $arr[3] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn btn-primary" name="inscription"
                                                    value="submit">S'inscrire
                                            </button>
                                            <button type="reset" class="btn btn-danger">Annuler</button>
                                        </div>
                                    </div>

                                </form>
                            </fieldset>
                        </fieldset>

                        <?php include 'menu_droite.php'; ?>

                    </div>
                    <!--  end table-content  -->
                </div>
                <!--  end content-table-inner ............................................END  -->
            </td>
            <td id="tbl-border-right"></td>
        </tr>
        <tr>
            <th class="sized bottomleft"></th>
            <td id="tbl-border-bottom">&nbsp;</td>
            <th class="sized bottomright"></th>
        </tr>
    </table>
    <div class="clear">&nbsp;</div>

<?php include 'footer.php'; ?>
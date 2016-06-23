        <?php
        include 'header.php'; 
        include 'dao/dao_panier.php';
        include 'dao/dao_sous_categorie.php';
        include 'dao/dao_categorie.php';
        include 'entite/connection.php';
        include 'dao/dao_acheteur.php';
        include 'dao/sous_categorie.php';
        include 'dao/dao_vendeur.php';
        include 'dao/dao_produit.php';
        include 'dao/dao_photo.php';
        $id_produit = $_GET['d'];
        $arr = get_produit_all($id_produit);
        ?>
	<!--  start page-heading -->
	<div id="page-heading">
                <ul class="breadcrumb" style="width: 1190px">
                    <li class="active"><a href="index.php">ACCUEIL</a> <span class="divider">/</span></li>
                </ul>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">

			<!--  start table-content  -->
			<div id="table-content" style="width: 1200px;">
                           <?php include 'menu_gauche.php'; ?>
                                <div style="float: left;width: 740px;border: solid whitesmoke 1px;margin-right: 10px">
                                    <form class="form-horizontal" action="modifier_produit.php" method="post" onsubmit="return verifier(this);" enctype="multipart/form-data" style="margin-top: 20px">
                                    <div style="width: 430px;float: left;">
                                                   <div class="control-group">
                                                       <input type="hidden" name="id" value="<?php echo $arr[0] ?>"/>
                                                     <strong class="control-label" for="produit">Nom produit:</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                         <span class="add-on"><i class="icon-gift"></i></span><input  class="input-large" type="text" value="<?php echo $arr[5]; ?>" name="produit"  id="produit">
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="quantite">Quantitée</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-tags"></i></span><input  class="input-large" type="text"  value="<?php echo $arr[7]; ?>" name="quantite" id="quantite">
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="prix">Prix unitaire</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-barcode"></i></span><input  class="input-large" type="text"  value="<?php echo $arr[6]; ?>"  name="prix" id="prix">
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="Nom">Caractéristiques</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-align-justify"></i></span><input  class="input-large" type="text"  name="caracteristique" id="caracteristique" value="<?php echo $arr[8]; ?>">
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="Nom">Etat</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-move"></i></span>
                                                     <select class="input-large">
                                                            <option > Etat du produit </option>
                                                            <option > Neuf</option>
                                                            <option > Occasion</option>
                                                    </select>
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="Nom">Categorie</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-folder-close"></i></span>
                                                     <select name="region" id="region"  onchange="getDepartements(this.value);" class="input-large" >
                                                    <option value="vide">- - - Choisissez une catégorie - - -</option>
                                                    <?php
                                                    foreach($regions as $nr => $nom)
                                                        {
                                                        ?>
                                                         <option value="<?php echo($nr); ?>" > <?php echo($nom); ?> </option>
                                                        <?php
                                                        }
                                                        ?>
                                                        </select>
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="Nom">Categorie</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-folder-close"></i></span>
                                                         <span id="blocDepartements"></span><br />
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="Nom">Description</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-align-center"></i></span>
                                                     <textarea rows="5" name="description" id="description" class="input-large"><?php echo $arr[9]; ?></textarea>
                                                     </div>
                                               </div>
                                               
                                               
                                               
                                               
                                               <div class="control-group">
                                                     <strong class="control-label" for="Nom"></strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                         <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                         <button type="reset" class="btn">Annuler</button>
                                                     </div>
                                               </div>

                                    
                                    </div>
                                    <div style="width: 295px;float: left;">
                                        <div style="width: 300px;height: 160px;">
                                           <?php $arr1 = Liste_photo_par_produits($arr[0]);
                                                 $i=1;
                                                            foreach ($arr1 as $arr1)   {?>
                                            <div class="control-group">
                                                     <img src="photos/<?php echo $arr1[3]; ?>" class="thumbnail"  style="width: 285px;height: 110px;"/>
                                                   
                                                     <div class="input-prepend" style="margin-left: 10px">
                                                   
                                                        <input type="file" class="span3" name="image<?php echo $i; ?>"/><br />
                                                     </div>
                                              </div>
                                            <?php 
                                            $i++;
                                            } ?>
                                        </div>
                                    </div>
                                    </form>
                                </div>

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
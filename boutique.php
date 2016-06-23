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

  $id_boutique = $_GET['bkt'];
        ?>
	<!--  start page-heading -->
	<div id="page-heading">
                <?php  $boutique = get_vendeur($id_boutique) ?>
                <ul class="breadcrumb">
                    <li><a href="index.php">ACCUEIL</a> <span class="divider">/</span></li>
                    <li class="active"><?php echo $boutique[0]['nom_v'] ?></li>
                    
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
                                
                                <fieldset style="float: left;width: 740px;margin-right: 10px">
                                <div class="alert alert-success">
                                   <button type="button" class="close" data-dismiss="alert">×</button>
                                   <h4>Decon!</h4>
                                   Ici vous avez Les  différents produits de la boutique <strong><?php echo $boutique[0]['nom_v'] ?></strong> Faite nous confiance et vous-serez satisfait
                                </div>
                                      <?php $arr_btk = liste_PAR_VENDEUR($id_boutique); 
                                         foreach ($arr_btk as $arr_btk) {
                                         $arr1 = Liste_par_produits_limite($arr_btk[0]); 
                                      ?>
                                <fieldset style="width: 32.3%;height:280px;float: left;margin-right:4px;border-radius: 6px 6px 6px 6px;border: none;margin-top: 20px;">                                 
                                     <div class="well well-small">
                                         <?php echo $arr_btk['libelle'] ?> | <?php echo $arr_btk['prix'] ?> Fcfa
                                     </div>
                                    <fieldset style="width: 95%;height: 56%;position: relative;border:none;margin-top: -18px;margin-bottom: 18px">
                                        
                                         <a href="detail.php?d=<?php echo $arr_btk[0];  ?>"><img src="photos/<?php echo $arr1[0][3]; ?>" class="thumbnail"  style="width: 100%;height: 100%;"/></a>
                                    </fieldset>
                                    <fieldset style="width:100%;height: 12%;">
                                      <a href="detail.php?d=<?php echo $arr_btk[0];  ?>" class="btn">les détails&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-list-alt"></i></a>
                                      <a href="panier_ajouter.php?prod=<?php echo $arr_btk[0];  ?>&qtte=1&prix=<?php echo $arr_btk['prix'] ?>&loc=boutique.php?bkt=<?php echo $id_boutique;?>" class="btn  btn-primary">Panier&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-shopping-cart icon-white"></i></a>
                                   </fieldset>
                                </fieldset>
                                <?php } ?>
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
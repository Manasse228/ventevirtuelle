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
                                <div style="float: left;width: 740px;border:solid whitesmoke 1px ;margin-right: 10px">
                                  <?php 
                                $id_cat = $_GET['cat']; 
                                $arr = get_produit_by_sous_catégorie_limite($id_cat); 
                                    foreach ($arr as $arr) {
                                         $arr1 = Liste_par_produits_limite($arr[0]); 
                                ?>
                                <fieldset style="width: 32.3%;height:280px;float: left;margin-right:4px;border-radius: 6px 6px 6px 6px;border: none;margin-top: 20px;">                                 
                                     <div class="well well-small">
                                         <?php echo $arr['libelle'] ?> | <?php echo $arr['prix'] ?> Fcfa
                                    </div>
                                    <fieldset style="width: 95%;height: 56%;position: relative;border:none;margin-top: -18px;margin-bottom: 18px">
                                         <a href="detail.php?d=<?php echo $arr[0];  ?>"><img src="photos/<?php echo $arr1[0][3]; ?>" class="thumbnail"  style="width: 100%;height: 100%;"/></a>
                                    </fieldset>
                                    <fieldset style="width:100%;height: 12%;">
                                      <a href="detail.php?d=<?php echo $arr[0];  ?>" class="btn">les détails&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-list-alt"></i></a>
                                      <a href="panier_ajouter.php?prod=<?php echo $arr[0] ?>&qtte=1&prix=<?php echo $arr[3] ?>&loc=index.php" class="btn  btn-primary">Panier&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-shopping-cart icon-white"></i></a>
                                   </fieldset>
                                </fieldset>
                                <?php } ?>
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
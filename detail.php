<?php
  include 'header.php';
  include 'dao/dao_categorie.php';
  include 'entite/connection.php';
  include 'dao/dao_acheteur.php';
  include 'dao/dao_vendeur.php';
  include 'dao/dao_produit.php';
  include 'dao/dao_photo.php';
  include 'dao/dao_sous_categorie.php';
  include 'dao/dao_panier.php';
  $erreur = "";
  $id_produit = $_GET['d'];
  $arr = get_produit_all($id_produit);
?>  
	<!--  start page-heading -->
	<div id="page-heading">
                <ul class="breadcrumb" style="width: 1190px">
                    <li class="active"><a href="index.php">ACCUEIL</a> <span class="divider">/</span></li>
                    <li class="active">DETAIL</li>
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
                                 <div id="myCarousel" class="carousel slide" style="width: 400px;height: 300px;float: left">
                                <!-- Carousel items -->
                                <div class="carousel-inner" >
                                    <?php 
                                              $i = 0;
                                              $arr2 =  Liste_photo_par_produits($arr[0]);
                                              foreach ($arr2 as $arr2 ) {
                                                  $i++;
                                              ?>
                                                  <div class="<?php if($i==1){ echo"active item";} else {echo "item";}?>"><img src="photos/<?php echo $arr2[2]; ?>" class="img-polaroid" style="width: 400px;height: 300px;"/></div>
                                              <?php
                                    }?>
                                    
                                </div>
                                <!-- Carousel nav -->
                                <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                                <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                                </div>
                                    <div style="width: 320px;height: 300px;float: right;margin-bottom: 20px">
                                        <h3 style="color: palevioletred">Prix :&nbsp;<?php echo $arr['prix']; ?> Fcfa</h3>
                                        <hr/>
                                        <strong>Nom : <?php echo $arr['libelle']; ?></strong><br/>
                                        <strong>Catégorie : <?php echo $arr[3]; ?></strong><br/>
                                        <strong>Disponibilité : <?php echo $arr['quantite']; ?></strong><br/>
                                        <strong>Vendeur : <?php echo $arr[1]; ?></strong>
                                        <hr/>
                                         <div class="well well-small">
                                             <strong>Caractéristique : </strong><?php echo $arr['caracteristique'] ?>
                                         </div>
                                        <hr/>
                                         <a href="panier_ajouter.php?prod=<?php echo $arr[0] ?>&qtte=1&prix=<?php echo $arr['prix'] ?>&loc=detail.php?d=<?php echo $arr[0] ?>" class="btn  btn-primary">&nbsp;Panier&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-shopping-cart icon-white"></i></a>
                                    </div>
                                    <div >
                             <ul id="onglets">
                                  <li class="actif">Description</li>
                                  <li>Info</li>
                             </ul>
                            <div id="contenu">
                                <div class="item">
                                <fieldset class="well well-small">
                                   <?php echo $arr['description'] ?>
                                </fieldset>
                                </div>
                                <div class="item"> les info supplémentaire du produit</div>
                            </div>
                        </div>
                              <div class="">
                                   <h4 style="color: #336600">Autres produits</h4>
                                   <?php
                                     $arr_similaire = get_produit_by_sous_catégorie_limite_sans_produit($arr[2],$id_produit);
                                     foreach ($arr_similaire as $arr_similaire){
                                     $arr_tof = Liste_par_produits_limite($arr_similaire[0]);
                                   ?>
                                   <div style="width: 32.8%;height:280px;float: left;margin-right:4px;border-radius: 6px 6px 6px 6px;border: none;margin-top: 20px;">
                                     <div class="well well-small">
                                         <?php echo $arr_similaire['libelle'] ?> | <?php echo $arr_similaire['prix'] ?> Fcfa
                                     </div>
                                    <div style="width: 95%;height: 56%;position: relative;border:none;margin-top: -18px;margin-bottom: 18px">
                                         <a href="detail.php?d=<?php echo $arr_similaire[0];  ?>"><img src="photos/<?php echo $arr_tof[0][3]; ?>" class="thumbnail"  style="width: 100%;height: 100%;"/></a>
                                    </div>
                                    <div style="width:100%;height: 12%;">
                                      <a href="detail.php?d=<?php echo $arr_similaire[0];  ?>" class="btn">&nbsp;détails&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-list-alt"></i></a>
                                      <a href="panier_ajouter.php?prod=<?php echo $arr_similaire[0] ?>&qtte=1&prix=<?php echo $arr_similaire['prix'] ?>&loc=detail.php?d=<?php echo $arr[0] ?>" class="btn  btn-primary">&nbsp;Panier&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-shopping-cart icon-white"></i></a>
                                   </div>
                                </div>
                               <?php } ?>
                             </div>
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
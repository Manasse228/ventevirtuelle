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
                    <li class="active">Confirmation</li>
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
                                <fieldset style="float: left;width: 740px;border: solid black 1px;margin-right: 10px">
                                  <fieldset style="width: 740px;border: none;">
                                                <div class="alert alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <h4>Message de confirmation!</h4>

                                                </div>
                                                <fieldset style="width: 60%;border: none;margin: auto;padding-bottom: 20px">
                                                    <h4></h4>


                                                            <h4>
                                                                Votre compte a été créé avec succès. Vous pouvez vous connecter.
                                                            </h4>


                                                </fieldset>
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
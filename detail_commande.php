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
        include 'dao/dao_commande.php';
         ?>
	<!--  start page-heading -->
	<div id="page-heading">
                <ul class="breadcrumb" style="width: 1190px">
                    <li class="active"><a href="index.php">ACCUEIL</a> <span class="divider">/</span></li>
                    <li class="active"><a href="index.php">ACHETEUR</a> <span class="divider">/</span></li>
                    <li class="active">DETAIL COMMANDE<span class="divider">/</span></li>
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
                                <div style="float: left;width: 740px;border: solid black 1px;margin-right: 10px">
                                       <table width="100%"  border="0" cellpadding="0" cellspacing="0" id="product-table">
                                            <tr>
                                               <th width="20%" class="table-header-repeat line-left minwidth-1" ><a href="">Produits</a></th>
                                                <th width="20%" class="table-header-repeat line-left minwidth-1"><a href="">Quantitée</a></th>
                                                <th width="20%" class="table-header-repeat line-left minwidth-1"><a href="">Vendeur</a></th>
                                                <th width="20%" class="table-header-repeat line-left minwidth-1"><a href="">Prix unitaire</a></th>
                                            </tr>
                                            <?php $arr_produit = produit_commmande($_GET["key"]);
                                            foreach ($arr_produit as $arr_produit){
                                              ?>
                                            <tr>
                                               <td><?php echo $arr_produit[0] ?> </td>
                                               <td><?php echo $arr_produit[3] ?> </td>
                                               <td><?php echo $arr_produit[2] ?> </td>
                                               <td><?php echo $arr_produit[1] ?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                       </table>
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
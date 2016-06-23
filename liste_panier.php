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
        include ("fonction.php");
        
        
               
        
        ?>
	<!--  start page-heading -->
	<div id="page-heading">
                <ul class="breadcrumb" style="width: 1190px">
                    <li class="active"><a href="index.php">ACCUEIL</a> <span class="divider">/</span></li>
                    <li class="active">PANIER</li>
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
                                <div style="float: left;width: 740px;border: solid whitesmoke 1px;margin-right: 10px;">
                                  <?php if (!isset($_SESSION['panier'])){ ?>
                                         <div class="alert alert-success">
                                   <button type="button" class="close" data-dismiss="alert">×</button>
                                   <h4>Désolé le panier est vide</h4>
                                   </div>
                                       <?php }
                                       else { ?>
                                    <form method="get" action="tester.php">
                                  <table width="100%"  border="0" cellpadding="0" cellspacing="0" id="product-table">
                                       
                                            <tr>
                                                <th width="10%" class="table-header-repeat line-left minwidth-1" ><a href="">Produits</a></th>
                                                <th width="33%" class="table-header-repeat line-left minwidth-1"><a href="">Quantitée à commander</a></th>
                                                <th width="10%" class="table-header-repeat line-left minwidth-1"><a href="">Prix</a></th>
                                                <th width="10%" class="table-header-repeat line-left minwidth-1"><a href="">Catégorie</a></th>
                                                <th width="10%" class="table-header-repeat line-left minwidth-1"><a href="">Vendeur</a></th>
                                                <th width="7%" class="table-header-repeat line-left "><a href="">Supprimer</a></th>
                                            </tr>
                                   <?php if (nbr()>0){ ?>
                                            <?php
                                            nbr();
                                              for($i=0;$i<nbr();$i++){ 
                                                   $produits = get_produit($_SESSION['panier']['id_article'][$i]); 
                                                   ?>
                                            <tr>
                                                <td ><a href=""><?php echo $produits['libelle'];?> </a></td>
                                                <td >
                                                    
                                                    <select name="<?php echo 'combo'.$i;?>" class="span2" onchange="document.getElementById(<?php echo $_SESSION['panier']['id_article'][$i];?>).value = this.value*'<?php echo $produits['prix'];?>';calcul();" >
                                                        <?php for($j=1;$j<=$produits['quantite'];$j++){?>
                                                        <option value="<?php echo $j; ?>" onclick=""><?php echo $j; ?></option>
                                                        <?php }?>
                                                    </select>
                                                        
                                                </td>
                                                <td ><input type="text" href="" id="<?php echo $_SESSION['panier']['id_article'][$i];?>" name="" value="<?php echo $produits['prix'];?>" disabled style="width: 100px" /></td>
                                                <td ><a href=""><?php echo $produits['lib_s'];?></a></td>
                                                <td ><a href=""><?php echo $produits['id_vendeur'];?></a></td>
                                                <td><a href="enlever_panier.php?k=<?php echo $_SESSION['panier']['id_article'][$i];?>"><img src="images/Zoom-Out.png"/></a></td>
                                            </tr>
                                            <?php } }?>
                                   
                                 </table>
                                    <a href="#" class="btn btn-large " onclick="vider(this)">Vider le panier</a>
                                    <input type="submit"  class="btn btn-large btn-primary" value="Payer avec lion" name="valider" onclick="if(confirm(' VOUS SEREZ REDIRIGER VERS LA PLATTE FORME DE PAYEMENT , MERCI DE CONFIRMER !'))return true;else return false;">
                                </form>
                                    
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
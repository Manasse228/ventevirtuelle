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
        include 'dao/dao_cbr.php';
        $acheteur = get_acheteur($_GET['k']);
        $_SESSION['id'] = $acheteur[0][0];
        $_SESSION['nom'] = $acheteur[0][1];
        $_SESSION['type']="acheteur";
        if (!isset($_SESSION['id']))
            {
        header ('Location: index.php');
        exit();
      }
        ?>
	<!--  start page-heading -->
	<div id="page-heading">
                <ul class="breadcrumb" style="width: 1190px">
                    <li class="active"><a href="index.php">ACCUEIL</a> <span class="divider">/</span></li>
                    <li class="active">ZONE ACHETEUR</li>
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
                                <div style="float: left;width: 740px;margin-right: 10px">
                                   <fieldset style="height: 60px;width: 60px;margin-bottom: 10px;float: left;"><img src="images/User-256x256.png" width="60px" height="60px"/></fieldset>
                                    <fieldset style="height: 45px;width: 20%;margin-left: 20px;margin-bottom: 10px;">
                                     <b style="font-size: 12px;font-family: serif;">Bienvenu: </b>
                                     <i style="color: green;"><?php echo $_SESSION['nom']; ?></i><br/>
                                     <b style="font-size: 12px;font-family: serif;">Date: </b>
                                     <i style="color: green;"><?php echo Date("d-m-y"); ?></i><br/>
                                     <b style="font-size: 12px;font-family: serif;color: purple">Acheteur</b>
                                    </fieldset>
                                  <ul id="onglets">
                                  <li class="actif" >Liste de vos achats</li>
                                  <li>Editions</li>
                                </ul>
                                <div id="contenu">
                                    <div class="item">
                                        <table width="100%"  border="0" cellpadding="0" cellspacing="0" id="product-table">
                                            <tr>
                                               <th width="20%" class="table-header-repeat line-left minwidth-1" ><a href="">Code commande</a></th>
                                                <th width="20%" class="table-header-repeat line-left minwidth-1"><a href="">Date commande</a></th>
                                                <th width="20%" class="table-header-repeat line-left minwidth-1"><a href="">Montant Global</a></th>
                                                <th width="20%" class="table-header-repeat line-left minwidth-1"><a href="">Edition</a></th>
                                                 <th width="20%" class="table-header-repeat line-left minwidth-1"><a href="">Cbr</a></th>
                                            </tr>
                                            <?php 
                                            $i=0;
                                            $arr_cmd = commande_acheteur($_SESSION['id']);
                                            foreach ($arr_cmd as $arr_cmd) { ?>
                                            <tr>
                                                    <td><?php echo $arr_cmd[0] ?></td>
                                                    <td><?php echo $arr_cmd[2] ?></td>
                                                    <td><?php echo $arr_cmd[3] ?> FCFA</td>
                                                    <td> <a href="detail_commande.php?key=<?php echo $arr_cmd[0] ?>">Voir detail</a> |<a href="archiver.php"> Archivez </a></td>
                                                    <td>
                                                        <?php $cbr = cbr_commande($arr_cmd[0]);
                                                          echo $cbr[0];
                                                        ?>

                                                    </td>
                                            </tr>
                                           <?php }
                                           $i++?>
                                        </table>
                                    </div>
                                    <div class ="item">
                                        
                                    </div>
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
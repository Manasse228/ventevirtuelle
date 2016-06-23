        
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
        include 'fonction.php';
        include 'dao/dao_cbr.php';
        include 'dao/dao_commande.php';
        include 'dao/dao_cbr_deja.php';
        include 'dao/dao_produit_panier.php';    
        require ("enlever_stock.php");        
        vider_panier();
        $ach = get_acheteur($id_acheteur);
        $script = curl('http://195.43.44.45/SMSsend?number=228'.$ach[0][2].'&user=1173617&pass=c7dsp7dy&message=Votre+commande++:++'.$_SESSION['code'].'+++CBR='.$cbr.'&ownnum=DEKON&type=LongSMS');
        unset($_SESSION['code']);
    
        ?>
	<!--  start page-heading -->
	<div id="page-heading">
                <ul class="breadcrumb" style="width: 1190px">
                    <li class="active"><a href="index.php">ACCUEIL </a> <span class="divider">/</span></li>
                   
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
                                  <div class="alert alert-success">
                                   <button type="button" class="close" data-dismiss="alert">×</button>
                                   <h4>Merci</h4>
                                   <p>Votre commande a été bien enregistré et vous allez un code CBR que vous deviez remetre au/aux vendeur lors de l'échange</p>
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
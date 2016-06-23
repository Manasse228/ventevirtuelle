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
        include 'dao/dao_cbr.php';
        $vendeur = get_vendeur($_GET['k']);
                     $_SESSION['id'] = $vendeur[0][0];
                     $_SESSION['nom'] = $vendeur[0][1];
                     $_SESSION['nb_max'] = $vendeur[0][2];
                     $_SESSION['type']="vendeur";
        if (!isset($_SESSION['id'])) {
        header ('Location: index.php');
        exit();
    }
      
       ?>
	<!--  start page-heading -->
	<div id="page-heading">
                <ul class="breadcrumb" style="width: 1190px">
                    <li class="active"><a href="index.php">ACCUEIL</a> <span class="divider">/</span></li>
                    <li class="active">ZONE VENDEUR</li>
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
                                     <b style="font-size: 12px;font-family: serif;color: purple">Vendeur</b>
                                    </fieldset>
                                   <ul id="onglets">
                                  <li class="actif" >Code de livraison</li>
                                  <li >Modifier ou supprimer des produits</li>
                                  <li>Ajouté des produits</li>
                                  
                                  </ul>
                                <div id="contenu">
                                    <div class="item">
                                        <form class="form-horizontal" action="cbr.php" method="post">
                                           <fieldset class="control-group">
                                                     <strong class="control-label" for="cbr">Code de livraison:</strong>
                                                     <fieldset class="input-prepend" style="margin-left: 20px;margin-bottom: 20px">
                                                     <span class="add-on"><i class="icon-tags"></i></span><input  class="input-xlarge" type="text"  name="cbr" id="cbr">
                                                     <button type="submit" class="btn btn-primary">Vérifier</button>
                                                     </fieldset>
                                                     <?php if(isset ($_GET['verif']))
                                                             if($_GET['verif']=="false")
                                                             { ?>
                                                     <fieldset class="alert alert-error" style="margin-top: 12px;">
                                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                                        <strong>Erreur!</strong> Votre code de livraison n'a pas été reconnu.
                                                     </fieldset>
                                                     <?php
                                                             }
                                                     ?>
                                                     <?php if(isset ($_GET['cp']))
                                                             if($_GET['cp']=="true")
                                                             { ?>
                                                     <fieldset class="alert alert-success" style="margin-top: 12px;">
                                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                                        <strong>Félicitation</strong> Votre code de livraison a été valider merci !
                                                     </fieldset>
                                                     <?php
                                                             }
                                                     ?>
                                                     <?php if(isset ($_GET['verif']))
                                                             if($_GET['verif']=="true")
                                                             { ?>
                                                         <table width="100%"  class="table table-bordered">
				     <tr>
                                        <th width="40%"  >Produits equivalents</th>
					<th width="10%" >Code de livraison</th>
                                     </tr>
                                                     <?php
                                                          $arr = cbr_verif($_SESSION['id'], $_GET['cbr']);
                                                          foreach ($arr as $arr){
                                                     ?>
                                     <tr>
                                         <td><?php echo $arr[0]; ?></td>
                                         <td><?php echo $arr[1]; ?></td>
                                     </tr>
                                                      <?php } ?>
                                                         </table>
                                                     <a class="btn" href="valide_cbr.php?key=<?php echo $arr[1] ?>">Valider le code de livraison</a>
                                                     <?php
                                                             }
                                                     ?>
                                           </fieldset>
                                        </form>
                                    </div>
                                  <div class="item">
                                     <table width="100%"  border="0" cellpadding="0" cellspacing="0" id="product-table">
				     <tr>
                                       <th width="10%" class="table-header-repeat line-left minwidth-1" ><a href="">Nom</a></th>
					<th width="40%" class="table-header-repeat line-left minwidth-1"><a href="">Photos</a></th>
                                        <th width="10%" class="table-header-repeat line-left minwidth-1"><a href="">Prix</a></th>
                                        <th width="10%" class="table-header-repeat line-left minwidth-1"><a href="">Quantitée</a></th>                             
                                        <th width="10%" class="table-header-repeat line-left minwidth-1"><a href="">Catégorie</a></th>
                                        <th width="10%" class="table-header-repeat line-left minwidth-1"><a href="">Edition</a></th>
				    </tr>
                                         <?php 
                                            $array = liste_PAR_VENDEUR($_SESSION['id']);
                                            foreach ($array as $arr)
                                            {
                                                $arr1 = Liste_photo_par_produits($arr[0]);
                                                echo '<tr>';
                                                echo '<td valign="top">'.$arr[3].'</td>';                                        
                                                echo '<td>';
                                                    foreach ($arr1 as $arr1){
                                                    echo '<fieldset style="height: 60px ; width: 60px ; float:left; border-style: none; margin-right: 2px;">
                                                              <a href="photos/'.$arr1[2].'" rel="lightbox[/'.$arr1[1].']" >
                                                                  <img src="photos/'.$arr1[3].'" width="58px" height="58px" />
                                                              </a>
                                                          </fieldset>'; 
                                                                            }
                                                        echo '</td> '; 
                                                        echo ' <td valign="top">'.$arr[4].' (Fcfa)</td>';
                                                        echo ' <td valign="top">'.$arr[5].'</td>';  
                                                        echo ' <td valign="top">'.$arr[2].'</td>';
                                                        echo '<td class="options-width">';					
                                                        echo '<a href="modifier.php?d='.$arr[0].'" title="Modifier" class="icon-1 info-tooltip"></a>';
                                                        echo '<a href="#" title="Supprimer" id="S" class="icon-2 info-tooltip" onclick="confirme(this,'.$arr[0].')"></a>';
                                                        echo '</td>';
                                                        echo '</tr>';
                                             }
                                         ?>
                                    </table>
                                  </div>
                                    
                                 <div class="item">
                                     <form class="form-horizontal" action="ajouter.php" method="post" onsubmit="return verifier(this);" enctype="multipart/form-data">	
                                           
                                               <div class="control-group">
                                                     <strong class="control-label" for="produit">Nom produit:</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-gift"></i></span><input  class="input-xlarge" type="text" placeholder="Saisir le nom du produit" name="produit"  id="produit">
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="quantite">Quantitée</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-tags"></i></span><input  class="input-xlarge" type="text"  name="quantite" id="quantite">
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="prix">Prix unitaire</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-barcode"></i></span><input  class="input-xlarge" type="text"  name="prix" id="prix">
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="Nom">Caractéristiques</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-align-justify"></i></span><input  class="input-xlarge" type="text"  name="caracteristique" id="caracteristique">
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="Nom">Etat</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-move"></i></span>
                                                     <select class="input-xlarge">
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
                                                     <select name="region" id="region"  onchange="getDepartements(this.value);" class="input-xlarge">
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
                                                     <textarea rows="5" name="description" id="description" class="input-xlarge"></textarea>
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="Nom">Image :</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-picture"></i></span>
                                                        <input type="file" class="file_1" name="image1"/><br />
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="Nom">Image :</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-picture"></i></span>
                                                        <input type="file" class="file_1" name="image2"/><br />
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="Nom">Image :</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-picture"></i></span>
                                                        <input type="file" class="file_1" name="image3"/><br />
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="Nom">Image :</strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                     <span class="add-on"><i class="icon-picture"></i></span>
                                                        <input type="file" class="file_1" name="image4"/><br />
                                                     </div>
                                               </div>
                                               <div class="control-group">
                                                     <strong class="control-label" for="Nom"></strong>
                                                     <div class="input-prepend" style="margin-left: 20px">
                                                         <button type="submit" class="btn btn-primary">Ajouter</button>
                                                     </div>
                                               </div>                                             
                                             
                                    </form>
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
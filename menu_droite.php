<div style="width: 200px;float: left;">
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                    <a class="btn btn-primary accordion-toggle">
                                         <small class="icon-shopping-cart icon-white"></small>&nbsp;Votre panier
                                    </a>
                                    </div>
                                <div id="collapseOne" class="accordion-body collapse in">
                                     <div class="accordion-inner">
                                             <a href="liste_panier.php" class="btn btn-large btn-danger"  title="titre" >
                                             <img src="images/panier.png"/>
                                             <small style="font-size: 16px;color: white;font-family: tahoma">
                                             <?php  if(isset($_SESSION['panier'])){
                                                 echo '<span class="badge badge-info">'. nbr().'</span>';
                                                 echo '  Payer';
                                                 }
                                                    else {
                                                  echo '<span class="badge badge-info">0</span>';
                                                  echo 'Votre panier est vide';
                                                  }?>
                                             </small>
                                             </a>
                                     </div>
                                </div>
                </div>
                                
                                <div class="accordion" id="accordion3">
                                         <?php $arra = liste_all();
                                               foreach ($arra as $arra) {
                                         ?>
                                             <div class="accordion-group">
                                              <div class="accordion-heading">
                                                  
                                                    <a class="btn btn-primary accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#<?php echo ucwords($arra[2]); ?>">
                                                         <?php echo ucwords($arra[2]); ?>
                                                    </a>
                                              </div>
                                                 <div id="<?php echo ucwords($arra[2]); ?>" class="accordion-body collapse in">
                                                        
                                                              <?php $arrc = liste_par_categorie($arra[0]);
                                                                foreach ($arrc as $arrc) {?>
                                                                <div class="accordion-inner">
                                                                <a href="categorie.php?cat=<?php echo $arrc[0] ?>" ><b style="font-size: 12px"><?php echo ucwords($arrc[2]) ?></b></a><br>
                                                                </div>
                                                              <?php } ?>
                                                        
                                                  </div> 
                                              
                                             </div>
                                         <?php  
                                               }
                                         ?>  
                                </div>
                            </div>
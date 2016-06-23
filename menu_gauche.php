 <div style="width: 200px;float: left;height: 100px;margin-right: 10px">
                                 <div class="accordion-group">
                                              <div class="accordion-heading">
                                                  
                                                    <a class="btn btn-primary accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accor">
                                                       <small class="icon-globe icon-white"></small>&nbsp;Nos boutiques
                                                    </a>
                                              </div>
                                                 <div id="accor" class="accordion-body collapse in">
                                                        <div class="accordion-inner"> 
                                                            <?php 
                                                            $arr_boutique = get_boutique();
                                                            foreach ($arr_boutique as $arr_boutique)
                                                            {
                                                            ?>
                                                           <a class="btn btn-block accordion-toggle" href="boutique.php?bkt=<?php echo $arr_boutique['id_vendeur'] ?>">
                                                               <i style="font-size: 12px"><?php echo ucwords($arr_boutique['nom_v']) ?></i>
                                                           </a>
                                                            <?php } ?>
                                                        </div>
                                                  </div> 
                                              
                                 </div>
                            <div class="accordion-group">
                                              <div class="accordion-heading">

                                                    <a class="btn btn-primary accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accorspub">
                                                       <small class="icon-tags icon-white"></small>&nbsp;Publicitées
                                                    </a>
                                              </div>
                                                 <div id="accorspub" class="accordion-body collapse in">
                                                        <div class="accordion-inner">
                                                            <img src="images/annonce-125x125.gif" class="thumbnail"/>
                                                        </div>
                                                  </div>

                                 </div>
                            </div>
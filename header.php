<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>DEKON</title>
        <!--     Debut Déclaration des elements css-->
        <link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" title="default"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" media="screen" title="default"/>
        <link href="css/onglet.css" rel="stylesheet" type="text/css" media="screen" title="default"/>
        <script src="assets/js/jquery.js"></script>
        <script   src="https://code.jquery.com/jquery-1.12.2.min.js"
                  integrity="sha256-lZFHibXzMHo3GGeehn1hudTAP3Sc0uKXBXAzHX1sjtk="
                  crossorigin="anonymous"></script>
        <!--        Fin Déclaration des elements css-->

    </head>
<body> 
    <div id="page-top-outer">
    </div>
<div class="clear">&nbsp;</div>

    <div class="nav-outer-repeat"> 
        <div id="setion1" style="width: 1220px;margin: auto" >
        <div class="nav-outer">
             <div id="nav-right">
                 <?php if (!isset ($_SESSION['id'])){ ?>
                 <a href="#" class="btn btn-inverse" rel="popover" style="float: right" title="Connectez-vous" data-placement="left"
                    data-content='
                    <form onSubmit="return(VerifForm(this))" method="post" action="index.php">
                                <div class="input-prepend">
                                 <span class="add-on"><i class="icon-envelope"></i></span><input required  id="prependedInput" style="width: 170px" type="text" placeholder="Votre mail" name="email" id="email">
                                </div>
                                <div class="input-prepend">
                                 <span class="add-on"><i class="icon-lock"></i></span><input required  id="prependedInput" style="width: 170px" type="password" placeholder="Mots de passe" name="passe" id="passe">
                                </div>
                                  <input type="radio" name="type" value="v" checked>Vendeur</input>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                                  <input type="radio" name="type" value="a" >Acheteur</input>
                                <button type="submit" class="btn btn-primary" value="Connexion" name="connexion" style="margin-top:10px;margin-left:25%">Se connecter</button><br/>
                                </form>'><small class="icon-lock icon-white"></small>&nbsp;&nbsp;&nbsp;&nbsp;Connexion</a>
                     <?php } ?>
                </div>
		 <?php if (isset($_SESSION['id'])){ ?> 
                <div class="btn-group" style="float: left">
                    <button class="btn btn-inverse"><small><small class="icon-user icon-white"></small>&nbsp;Mon Compte</small></button>
                <button class="btn btn-inverse dropdown-toggle " data-toggle="dropdown">
                     <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <?php  if($_SESSION['type']=="acheteur"){ ?>
			 <li><a href="acheteur.php?k=<?php echo $_SESSION['id'] ?>" style="width: 76%">Mon Espace</a></li>
                    <?php }?>
                    <?php  if($_SESSION['type']=="vendeur"){ ?>
			 <li><a href="vendeur.php?k=<?php echo $_SESSION['id'] ?>" style="width: 76%">Mon Espace</a></li>
                        <li><a href="maBoutique.php?vend=<?php echo $_SESSION['id'] ?>" style="width: 76%">Ma boutique</a></li>
                    <?php }?>
                   <li class="divider"></li>
                   <li><a href="#" style="width: 76%">Mes parametres</a></li>
                   <li class="divider"></li>
                   <li><a href="dao/deconnexion.php" style="width: 76%">Déconnection</a></li>
                </ul>
               </div>
                 <?php } ?>
		</div>
		
		<div class="nav">
		<div class="table">
                    <div class="btn-group">
                        <a href="index.php" class="btn btn-inverse"><small><small class="icon-home icon-white"></small>&nbsp;ACCUEIL</small></a>
                        <a href="inscription.php" class="btn btn-inverse"><small><small class="icon-th-list icon-white"></small>&nbsp;INSCRIPTION</small></a>

                        <a href="#" class="btn btn-inverse"><small><small class="icon-globe icon-white"></small>&nbsp;NOS BOUTIQUES</small></a>

                        <a href="#" class="btn btn-inverse"><small><small class="icon-bullhorn icon-white"></small>&nbsp;NOS ANNONCES</small></a>
                    </div>
                </div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
    </div>
</div>
<!--  start nav-outer-repeat................................................... END -->

  <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

    </body>
</html>
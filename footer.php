</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
<!-- <div id="footer-pad">&nbsp;</div> -->
	<!--  start footer-left -->
	<div id="footer-left">
	Admin<a>d</a>. All rights reserved.</div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>


    <script src="js/verifFormulaire.js" type="text/javascript"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>
    <script src="js/dept_xhr.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/bootstrap-affix.js"></script>
    <script src="assets/js/application.js"></script>
    <script src="js/onglet.js" type="text/javascript"></script>
    <SCRIPT LANGUAGE="JavaScript">
function confirme(shamp,$taf)
{ 
    if (confirm("Voulez-vous vraiment supprimer le produit?")) {
      shamp.href ="supprimer.php?id="+$taf;
    }
    else
      return false;
}
</SCRIPT>

 <SCRIPT LANGUAGE="JavaScript">
function vider(shamp)
{ 
    if (confirm("Voulez-vous vraiment vidé le panier ?")) {
        shamp.href ="vider_panier.php";
    }
    else
      return false;
}
</SCRIPT>

<SCRIPT LANGUAGE="JavaScript">
function calcul()
{
    i=0;
    <?php
       $i=0;
       while($_SESSION['panier']['id_article'][$i]){
       echo 'parseInt(document.getElementById("somme").value) + = parseInt(document.getElementById('.$_SESSION['panier']['id_article'][$i].').value);';
       $i=$i+1;       
       }?>
    
}
</SCRIPT>

<script>function VerifForm(formulaire)
                            {
                                        adresse = formulaire.email.value;
                                        var place = adresse.indexOf("@",1);
                                        var point = adresse.indexOf(".",place+1);
                                        if ((place > -1)&&(adresse.length >2)&&(point > 1))
                                            {
                                            formulaire.submit();
                                            return(true);
                                            }
                                        else
                                            {
                                            alert('Entrez une adresse e-mail valide!!');
                                            return(false);
                                            }
                          }</script>


</body>
</html>
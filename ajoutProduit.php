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

<?php

if (isset($_POST['upload']) && $_POST["upload"] == "Upload File") {
    $j = 0; //Variable for indexing uploaded image

    $target_path = "photos/test"; //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.)
        $file_extension = end($ext); //store extensions in the variable

        $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image

        $j = $j + 1;//increment the number of uploaded images according to the files in array

        if (($_FILES["file"]["size"][$i] < 800000) //Approx. 800kb files can be uploaded.
            && in_array($file_extension, $validextensions)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
                echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {//if file was not moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }
}
?>

<script type="text/javascript" >




    var abc = 0; //Declaring and defining global increement variable

    $(document).ready(function() {

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
        $('#add_more').click(function() {
            $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                $("<input/>", {name: 'file[]', type: 'file', id: 'file'}),
                $("<br/><br/>")
            ));
        });

//following function will executes on change event of file input to select different file
        $('body').on('change', '#file', function(){
            if (this.files && this.files[0]) {
                abc += 1; //increementing global variable by 1

                var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");

                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

                $(this).hide();
                $("#abcd"+ abc).append($("<img/>", {id: 'img', src: 'x.png', alt: 'delete'}).click(function() {
                    $(this).parent().parent().remove();
                }));
            }
        });

//To preview image
        function imageIsLoaded(e) {
            $('#previewimg' + abc).attr('src', e.target.result);
        };

        $('#upload').click(function(e) {
            var name = $(":file").val();
            if (!name)
            {
                alert("First Image Must Be Selected");
                e.preventDefault();
            }
        });
    });

</script>

 <script type="text/css">



     h2{
         margin-left: 30px;
     }
     .upload{
         background-color:#ff0000;
         border:1px solid #ff0000;
         color:#fff;
         border-radius:5px;
         padding:10px;
         text-shadow:1px 1px 0px green;
         box-shadow: 2px 2px 15px rgba(0,0,0, .75);
     }
     .upload:hover{
         cursor:pointer;
         background:#c20b0b;
         border:1px solid #c20b0b;
         box-shadow: 0px 0px 5px rgba(0,0,0, .75);
     }
     #file{
         color:green;
         padding:5px; border:1px dashed #123456;
         background-color: #f9ffe5;
     }
     #upload{
         margin-left: 45px;
     }

     #noerror{
         color:green;
         text-align: left;
     }
     #error{
         color:red;
         text-align: left;
     }
     #img{
         width: 17px;
         border: none;
         height:17px;
         margin-left: -20px;
         margin-bottom: 91px;
     }

     .abcd{
         text-align: center;
     }

     .abcd img{
         height:100px;
         width:100px;
         padding: 5px;
         border: 1px solid rgb(232, 222, 189);
     }
     b{
         color:red;
     }
     #formget{
         float:right;

     }


 </script>
    <!--  start page-heading -->
    <div id="page-heading">
        <ul class="breadcrumb" style="width: 1190px">
            <li class="active"><a href="index.php">ACCUEIL</a> <span class="divider">/</span></li>
            <li><a href="ajoutProduit.php">Ajout</a> <span class="divider">/</span></li>
            <li><a href="index.php">Actualiser</a> <span class="divider">/</span></li>
        </ul>
    </div>
    <!-- end page-heading -->

    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
        <tr>
            <th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt=""/>
            </th>
            <th class="topleft"></th>
            <td id="tbl-border-top">&nbsp;</td>
            <th class="topright"></th>
            <th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt=""/>
            </th>
        </tr>
        <tr>
            <td id="tbl-border-left"></td>
            <td>
                <!--  start content-table-inner ...................................................................... START -->
                <div id="content-table-inner">

                    <?php


                    function listeCategorie()
                    {
                        $bdd = new connexion();
                        $pdo = $bdd->getconnexion();
                        $query = 'SELECT id,libelle_cat from categorie';
                        $prep = $pdo->prepare($query);
                        $prep->execute();
                        $arr = $prep->fetchAll();
                        $prep->closeCursor();
                        $prep = NULL;
                        return $arr;
                    }

                    function listeSousCategorie($val){

                        $bdd = new connexion();
                        $pdo = $bdd->getconnexion();
                        $query = 'SELECT id_sous, libelle_sous_categorie from sous_categorie
                                    where id_categorie='.$val;
                        $prep = $pdo->prepare($query);
                        $prep->execute();
                        $arr = $prep->fetchAll();
                        $prep->closeCursor();
                        $prep = NULL;
                        return $arr;
                    }



                    ?>

                    <!--  start table-content  -->
                    <div id="table-content" style="width: 1200px;">
                        <?php include 'menu_gauche.php'; ?>
                        <div style="float: left;width: 740px;border: solid black 1px;margin-right: 10px">


                            <fieldset style="float: left;width: 740px;border: solid black 1px;margin-right: 10px">
                                <fieldset style="width: 740px;border: none;">
                                    <?php if (!($info)) { ?>
                                        <div class="alert alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <h4>Ajouter un produit</h4>

                                        </div>
                                    <?php } ?>
                                    <?php if ($info) { ?>
                                        <div class="alert alert-error">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <h4>Erreur!</h4>
                                            <?php echo $info; ?>
                                        </div>
                                    <?php } ?>
                                    <form class="form-horizontal" method="post"
                                          action="ajoutProduit.php" enctype="multipart/form-data" >


                                        <div class="control-group">
                                            <strong class="control-label" for="inputcpasse">Categorie</strong>
                                            <div class="input-prepend" style="margin-left: 20px">
                                                <select name="type" onchange="fetchselect(this.value);" >
                                                        <option value="">--Selectionner une option--</option>
                                                    <?php
                                                    $tab = listeCategorie();
                                                    foreach ($tab as $arr) {
                                                        echo '<option value="' . $arr[0] . '">' . $arr[1] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <strong class="control-label" for="inputcpasse">Sous-Categorie</strong>
                                            <div class="input-prepend" style="margin-left: 20px">
                                                <select name="type" id="sscateg">


                                                </select>
                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <strong class="control-label" for="libelle">Libelle</strong>
                                            <div class="input-prepend" style="margin-left: 20px">
                                                <input class="input-large" type="text" placeholder="Libelle du produit"
                                                       name="libelle" id="libelle"  autocomplete="off"
                                                       value="<?php echo $libelle ?>">

                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <strong class="control-label" for="prix">Prix</strong>
                                            <div class="input-prepend" style="margin-left: 20px">
                                                <input class="input-large" type="number" placeholder="Prix du produit"
                                                       name="prix" id="prix"  autocomplete="off"
                                                       value="<?php echo $prix ?>">

                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <strong class="control-label" for="quantite">Quantite</strong>
                                            <div class="input-prepend" style="margin-left: 20px">
                                                <input class="input-large" type="number" placeholder="Quantite"
                                                       name="quantite" id="quantite"  autocomplete="off"
                                                       value="<?php echo $quantite ?>">

                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <strong class="control-label" for="caracteristique">Caracteristique</strong>
                                            <div class="input-prepend" style="margin-left: 20px">
                                            <textarea type="text"
                                                      name="caracteristique" id="caracteristique"
                                                      autocomplete="off"
                                                      value="<?php echo $caracteristique ?>"></textarea>

                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <strong class="control-label" for="caracteristique">Description</strong>
                                            <div class="input-prepend" style="margin-left: 20px">
                                            <textarea type="text"
                                                      name="description" id="description"  autocomplete="off"
                                                      value="<?php echo $description ?>"></textarea>

                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <strong class="control-label" >Photo(s)</strong>
                                            <div class="input-prepend" style="margin-left: 20px">

                                                Only JPEG,PNG,JPG Type Image Uploaded. Image Size Should Be Less Than 800KB.
                                                <hr/>
                                                <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>

                                                <input type="button" id="add_more" class="upload" value="Add More Files"/>
                                                <input type="submit" value="Upload File" name="upload" id="upload" class="upload"/>

                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <div class="controls">

                                                <button type="submit" class="btn btn-primary" name="inscription"
                                                        value="submit">Ajouter
                                                </button>
                                                <button type="reset" class="btn btn-danger">Annuler</button>
                                            </div>
                                        </div>
                                    </form>
                                </fieldset>
                            </fieldset>

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
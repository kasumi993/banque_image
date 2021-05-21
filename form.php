
<div class ="formulaire">
<?php
if(isset($_FILES["input-file"])){
    $repertoire_upload = 'base_de_donnee/';
    if($_POST["newName"]==""){
        $the_name = $_FILES['input-file']['name'];
    }else{
        $filename = $_FILES['input-file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        $the_name = $_POST["newName"].".".$ext;
    }

    $result = move_uploaded_file($_FILES['input-file']['tmp_name'], $repertoire_upload.$the_name);

    if($result){ ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> votre image a bien ete enregistree, </strong> <a href="galerie.php" class="alert-link">voir la galerie</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

<?php }}
?>



<form action="#upload" method="POST" enctype="multipart/form-data">
    <div class="container box col-sm-10">
        <div class="row">
            <div class="col-sm-6 left">
                    <div class="file-field">
                        <p class="message">Veuillez entrer la photo que vous voulez enregistrer</p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <img width="200px" src="image/photo-camera-small.png" class="photo" alt="photo">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="input-file" id="input-text" class="btn btn-dark">Ajouter une photo</label>
                                    <input type="file" id="input-file" value="" name="input-file">
                                    <?php
                                        $a="tmp_name";
                                        if(isset($_FILES["input-file"])){
                                            $a=$_FILES['input-file']['tmp_name'];
                                        }
                                        if($a==""){
                                    ?>
                                        <div class="alert alert-danger" role="alert">
                                        veuillez choisir une photo
                                        </div>
                                            
                                    <?php
                                        }
                                    
                                    ?>
                                </div>
                            </div>
                    </div>
            </div>
            <div class="col-sm-6 right">
                <label class="message black">Voulez vous renommer la photo? <sup> (facultatif)</sup></label>
                <input type="text" placeholder="Nouveau nom" value="" maxlength="30" name="newName" class="newName"><br>
                <span><?php $warn ?></span>
                <button class="btn btn-primary save" type="submit">Sauvegarder</button>
            </div>
        </div>
    </div> 
    <a href="index.php" class="retour"> Retourner à l'accueil</a>
</form>

</div>





<script type="text/javascript">

  $(function() {
    $("input[type=file]").change(function(){
        var file= document.querySelector('input[type=file]').files[0];
        var imageType = /^image\//;
        if (!imageType.test(file.type)) {
            alert("veuillez sélectionner une image");
        }else{
            var reader  = new FileReader();

            reader.addEventListener("load", function () {
                var photoName =reader.result;
                if(photoName.length){
                    $(".photo").css("opacity","1");
                    $("img[src='image/photo-camera-small.png']").attr("src", photoName);
                }
                
            });
            if (file) {
            reader.readAsDataURL(file);
            }
        }
    })
})
</script>
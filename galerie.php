<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MaGalerie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<link href="css/entete.css" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="css/template_css/animate.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/template_css/magnific-popup.css">
    <!-- Salvattore -->
    <link rel="stylesheet" href="css/template_css/salvattore.css">
    <!-- Theme Style -->
    <link rel="stylesheet" href="css/template_css/style.css">

    <link rel="stylesheet" href="css/galerie.css">

    <script src="js/jquery/jquery.min.js"></script>
</head>
<body>
    
<!-- entete -->
<div class='header' id="header">
    <p class="nom">MaGalerie</p>
        <ul>
            <li id=acc><a href="index.php" class="lien">accueil</a></li>
            <li id=acc><a href="#" class="lien"  onclick="helpPressed()">help</a></li>
            <div id="helpBox">
                voici les instructions et ca et ceci et biensur ceci et donc merci de bien vouloir suivre les instructions :)
            </div>
        </ul>

    <div class="choice-bar">
        <div class="img"></div>
        <h2 class="welcom-mess">Bienvenue dans votre galerie personnelle</h2>


            <div id="cover">
                <form method="get" action="#fh5co-board">
                    <div class="tb">
                        <div class="td"><input type="text" class="search" placeholder="Search"></div>
                        <div class="td" id="s-cover">
                            <button type="submit">
                                <div id="s-circle"></div>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        <div id="page-display">
            <form id='select-div' action='galerie.php' method="get">
                <select name="page_display" id="page_display" value="all">
                    <option value="all"> Afficher Tout</option>
                    <option value="20">Afficher par page</option>
                </select>
            </form>
        </div>
</div>







  
<!-- fin entete -->

<!-- galerie -->

<div id="fh5co-main">
    <div class="container">
        <div class="row">
            <div class="alert alert-dark no-result" role="alert">
                Nous n'avons rien trouvé! Verifiez l'orthographe si vous etes sur d'avoir sauvegardé la photo dans votre galerie
            </div>
            <div id="fh5co-board" >
                

                <?php
                    
                    $nb_fichier = 0;
                    $nb_boite20=1;
                    $nb_boite=1;
                    if($dossier = opendir('./base_de_donnee')) {
                        ?>
                        <div class="_20-box <?php echo "_20-box-".$nb_boite20?>">
                        <?php
                        while(false !== ($fichier = readdir($dossier))) {
                            if($fichier != '.' && $fichier != '..' && $fichier != 'index.php') {
                                $nb_fichier++; // On incrémente le compteur de 1
                                ?>
                            
                                <div class="item result">
                                    <div class="animate-box">
                                        <a href="./base_de_donnee<?php echo "/".$fichier."\"" ?> class="image-popup fh5co-board-img" title=""><img  src="./base_de_donnee <?php echo "/".$fichier."\"" ?> alt="<?php echo $fichier ?>"></a>
                                    </div>
                                    <div class="fh5co-desc"> <?php echo $fichier ?> </div>
                                </div>
                                <?php

                                if($nb_fichier%20==0){
                                    $nb_boite20++;
                                    ?>
                                    <!-- navigation-->
                                    <div id="nav">
                                    <button id="" class="boutton_nav prev">&#8249;</button>

                                    <button id="" class="boutton_nav next">&#8250;</button>
                                    </div>
                                    <!-- fin navigation -->
                                    </div>
                                    
                                    <div class="_20-box <?php echo "_20-box-".$nb_boite20?>">
                                    <?php
                                }
                                
                            } // On ferme le if (qui permet de ne pas afficher index.php, etc.)
                            
                        } // On termine la boucle
                        if($nb_fichier%20<20 && $nb_fichier%20>0){
                            ?>
                            <!-- navigation-->
                            <div id="nav">
                                <button id="" class="boutton_nav prev">&#8249;</button>

                                <button id="" class="boutton_nav next" disabled >&#8250;</button>
                            </div>
                            <!-- fin navigation -->

                            </div>
                            <?php
                        }
                    closedir($dossier);
                    } else echo 'Le dossier n\' a pas pu être ouvert';  
                ?>

            </div>
            
        </div>
    </div>

</div>
<div class="counter"> <?php echo $nb_fichier." photos"; ?> </div>  <!-- le compteur de photos -->
<!-- fin galerie -->






<!--fonction affichage-->
<script>
$(function(){
    $('.boutton_nav').css('display','none');
        var nb_affiche=$('#page_display').val();
        var nbr_boite= <?php echo $nb_boite ?>;
        switch(nb_affiche){
            case '20': {
                $("._20-box").css('display','none');
                $("._20-box-"+nbr_boite).css('display','inline-block');
                $('.boutton_nav').css('display','inline-block');
                break;
            }
            default:{
                $('.boutton_nav').css('display','none');
                $("._20-box").css('display','inline-block');
            }
        }

    
//pour regler le probleme de la fonction qui ne pouvait etre appelée j'ai recréé la fonction
    $('#page_display').click(function(){
         nb_affiche=$('#page_display').val();
        switch(nb_affiche){
            case '20': {
                $("._20-box").css('display','none');
                $("._20-box-"+nbr_boite).css('display','inline-block');
                $('.boutton_nav').css('display','inline-block');
                break;
            }
            default:{
                $('.boutton_nav').css('display','none');
                $("._20-box").css('display','inline-block');
            }
        }
    })

    $('#nav .next').click(function(){
           nbr_boite++;
                $("._20-box").css('display','none');
                $("._20-box-"+nbr_boite).css('display','inline-block');
                $('.boutton_nav').css('display','inline-block');
    })
    $('#nav .prev').click(function(){
        if(nbr_boite>1){
                nbr_boite--;
                $("._20-box").css('display','none');
                $("._20-box-"+nbr_boite).css('display','inline-block');
                $('.boutton_nav').css('display','inline-block');
        }
    })
   
})

</script>
<!--fin fonction affichage-->


<!--fonction recherche-->
    <script>
        $(function() {
            $(".search").keyup(function () {
                var searchTerm = $(".search").val();
                $('.boutton_nav').css('display','none');
                $("._20-box").css('display','inline-block');
                var starting= new RegExp(searchTerm);
                $('img').each(function(){
                    if(!starting.test($(this).attr('alt'))){
                        $(this).parents().eq(2).removeClass('result');
                        $(this).parents().eq(2).addClass('not-result');
                    }else{
                        $(this).parents().eq(2).addClass('result');
                        $(this).parents().eq(2).removeClass('not-result');
                    }
                })
                var tofCount = $('.result').length;
                $('.counter').text(tofCount + ' photos correspondantes');

                if(tofCount == '0') {$('.no-result').show();}
                else {$('.no-result').hide();}
            })
        })
    </script>

<!--fin fonction recherche-->


    <script type="text/javascript" src="js/entete.js"></script>
    <!-- jQuery -->
    <!-- Waypoints -->
    <script src="js/template_js/jquery.waypoints.min.js"></script>
    <!-- Magnific Popup -->
    <script src="js/template_js/jquery.magnific-popup.min.js"></script>
    <!-- Salvattore -->
    <script src="js/template_js/salvattore.min.js"></script>
    <!-- Main JS -->
    <script src="js/template_js/main.js"></script>
</body>
</html>
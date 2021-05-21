<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ma galerie</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="vous pouvez creer votre banque d'image gratuitement">
        <link rel="icon" type="image/png" href="favicon.ico"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link href="css/index.css" rel="stylesheet">
        <link href="css/entete.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="css/form.css" />
 
        <script type="text/javascript" src="js/entete.js"></script>
        <script type="text/javascript" src="js/jquery/jquery.js"></script> 
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"> </script>  
    </head>
    <body>
    <div class='header' id="header">
    <div class="img"></div>
            <div id="introduction">
                <?php
                    include("entete.php");
                ?>
            </div>
            <div id="upload">
                <?php
                    include("form.php");
                ?>
            </div>
    </div>

    </body>
</html>
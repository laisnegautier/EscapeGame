<!DOCTYPE html>
<html>
    <head>
        <title>THE GREAT ESCAPE</title>
        <meta charset="utf-8" />
        <link rel="icon" href="public/img/icons/favicon.ico">
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- MY CSS -->
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="public/css/animationHome.css">
    </head>

    <body class="home">
        <div style="background-color: black;">
            <div class="wavesNight" style="background-image: url('public/img/home/stars.jpg'); opacity: 1"></div>
            
            <div class="wavesCastle" style="background-image: url('public/img/home/wavesCastle.png');"></div>
            <div class="wavesReturned" style="background-image: url('public/img/home/waves5.png'); transform: scaleX(-1);"></div>
            <div class="waves" style="background-image: url('public/img/home/waves5.png');"></div>   
        </div>

        <!-- BUTTONS/LINKS TO NAVIGATE -->   
        <div style="position: relative; z-index: 9999999;">   
            <?= $linkLeft ?>   
            <?= $linkRight ?> 
            <a href="index.php" title="Accueil" alt="Retourner à l'accueil"><img src="public/img/play/mainLogoSmall.png" title="THE GREAT ESCAPE - Retourner à l'accueil" alt="THE GREAT ESCAPE logo" style="position: absolute; left: 45%; width: 210px; top: 20px; animation: fadeIn 4s;" /></a>
    
        </div>

        <!-- BOOTSTRAP MODALS WHERE THE CONTENT IS DISPLAYED -->
        <div class="homeAction" style="animation: fadeIn 2s">
            <?= $content ?>
        </div>

        <!-- CINEMATIC EFFECTS -->
        <div class="cinematicBox" style="top: 0;"></div>
        <div class="cinematicBox" style="bottom: 0;"></div>
<div class="cinematicBox2" style="left: 0; <?php if(isset($animationOk)) {?> animation: fade-out-move-right 2s forwards <?php } else echo 'display: none'?>"></div>
        <div class="cinematicBox2" style="right: 0; <?php if(isset($animationOk)) {?> animation: fade-out-move-left 2s forwards <?php } else echo 'display: none'?>"></div>

        
        <!-- ERRORS -->
        <?php if(isset($err)) { ?>
            <div class="alert alert-danger" style="width: 100%; text-align: center; border: none; background: none; position: absolute; top: 150px; z-index: 99999999;" role="alert"><span style="background-color: rgba(102, 19, 19, 0.767); color: whitesmoke; padding: 20px 30px; border-radius: 3px;"><?= $err ?></span></div>
        <?php } ?>

        <!-- BOOTSTRAP + JQUERY + PARALLAX SCRIPTS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/utils/Draggable.min.js"></script>
        <script src="parallax/src/parallax.js"></script>

        <!-- MY JS SCRIPTS -->
        <script src="public/js/JQueryHomeFunctions.js"></script>
        <script src="public/js/homeFunctions.js"></script>
    </body>
</html>
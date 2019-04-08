<!DOCTYPE html>
<html>
    <head>
        <title>THE GREAT ESCAPE - PLAY</title>
        <meta charset="utf-8" />
        <link rel="icon" href="public/img/icons/favicon.ico">
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- MY CSS -->
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="public/css/animationHome.css">
    </head>

    <body onload="UpdateAllComponents(1, <?= $gamestate->getLastStepValidated() ?>), setInterval(function() { ComponentTimer(); }, 1000), ComponentMusic()">

        <!-- HEADER -->
        <header>

            <!-- MENU -->
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div>
                    <!-- <a  href="#"> -->
                        <img class="navbar-brand" width="210" src="public/img/play/mainLogoSmall.png" title="THE GREAT ESCAPE" alt="THE GREAT ESCAPE logo" style="animation: fadeIn 10s" />
                    <!-- </a> -->
                </div>
                
                <!-- Background ambiant music -->
                <div id="musicComponent" style="animation: fadeIn 15s"></div>

                <!-- Right menu -->
                <div id="timerComponent" style="animation: fadeIn 15s"></div>
            </nav>

            <!-- GAME TITLE -->
            <h4>Vous jouez à : <b><?= $gameInfos['titleGame'] ?></b></h4>

        </header>

        <!-- Parallax effect -->
        <div id="bigContainer">
            <div class="backgroundParallax" style="background-image: url('public/img/backgroundGames/<?= $gameInfos['locationBack1'] ?>'); animation: fadeIn 15s"></div>
            <div class="lensParallax" style="background-image: url('public/img/backgroundGames/<?= $gameInfos['locationBack2'] ?>'); animation: fadeIn 9s"></div>

            <!-- MAIN DISPLAY -->
            <div class="mainBox one">
            
                <!-- Go back to the previous riddle -->
                <button id="previousRiddle" class="btnArrows" disabled style="animation: fadeIn 5s"></button>
                
                <!-- RIDDLE -->
                <div class="riddleBox" style="animation: fadeIn 2s">
                    
                    <!-- Description riddle and answer form -->
                    <div id="answerForm" style="animation: fadeIn 5s"></div>
                    
                    <!-- Number of the riddle displayed -->
                    <div id="numberRiddle" style="animation: fadeIn 10s"></div>
                    
                    <!-- Message saying if the answer entered is the good one or not -->
                    <div id="validationRiddle"></div>
                </div>

                <!-- Go to the next riddle -->
                <button id="nextRiddle" class="btnArrows" disabled style="animation: fadeIn 5s"></button>

            </div>

            <!-- HELP ZONE --> 
            <div class="help" style="animation: fadeIn 15s">
                <button type="button" id="helpButton"><img src="public/img/play/chat.png" style="width: 35px;" title="Besoin d'aide ?" alt="Besoin d'aide ?" /></button>
                <div id="help" class="frameChat">
                    <h5>Messages</h5>
                    <div id="helpMessages" class="scrollbar"></div>  
                    <div id="helpForm"></div>  
                </div>   
            </div>  

        </div> 
        <!-- END PARALLAX -->

       
        <!-- FOOTER -->
        <footer>
            <nav class="navbar fixed-bottom navbar-expand-lg navbar-dark" style="">
                <div>
                    <button style="animation: fadeIn 10s" id="quitComponent" class="navbar-brand" onclick="javascript:(function() { let confirmBool = confirm('Voulez-vous vraiment quitter la partie ? Cette action est irréversible.'); if (confirmBool == true) { window.location.replace('index.php?action=play&quit=<?= $gamestate->getIdGamestate() ?>'); }}) ()">QUITTER</button>
                </div>

                <!-- Tip that appears after a moment -->
                <div id="tipComponent"></div>

                <div id="infosComponent" style="animation: fadeIn 10s"><span>Joué par </span> <?= $team->getNameTeam() ?><br /><span>Dirigé par</span> <?= $nameGM ?></div>
            </nav>
        </footer>


        <!-- BOOTSTRAP + JQUERY + PARALLAX SCRIPTS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/utils/Draggable.min.js"></script>
        <script src="parallax/src/parallax.js"></script>

        <!-- MY JS SCRIPTS -->
        <script src="public/js/playFunctions.js"></script>
        <script src="public/js/updatePlayComponents.js"></script>
        <script src="public/js/updateMessagesComponents.js"></script>
        <script src="public/js/JQueryFunctions.js"></script>
    </body>
</html>
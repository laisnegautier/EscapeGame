<!DOCTYPE html>
<html>
    <head>
        <title>THE GREAT ESCAPE - ACCUEIL</title>
        <meta charset="utf-8" />
        <link rel="icon" href="public/img/icons/favicon.ico">
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- MY CSS -->
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="public/css/animationHome.css">
    </head>

    <body class="home">
        <!-- Parallax effect -->
        <div id="bigContainer" >
            <div class="wavesNight" style="background-image: url('public/img/home/stars.jpg'); animation: fadeIn 15s;"></div>
            
            <div class="wavesCastle" style="background-image: url('public/img/home/wavesCastle.png'); animation: fadeIn 16s;"></div>
            <div class="wavesReturned" style="background-image: url('public/img/home/waves5.png'); transform: scaleX(-1); animation: fadeIn 9s;"></div>
            <div class="waves" style="background-image: url('public/img/home/waves5.png'); animation: fadeIn 2s;"></div>   

            <div class="greatWord" style="background-image: url('public/img/home/greatWord.png'); animation: fadeIn 9s;"></div>        
            <div class="escapeWord" style="background-image: url('public/img/home/escapeWord.png'); animation: fadeIn 10s;"></div>
        </div> 
        <!-- END PARALLAX -->
        
        <!-- BUTTONS/LINKS TO NAVIGATE -->      
        <?= $linkLeft ?>   
        <?= $linkRight ?> 
        <button type="button" class="btn btn-primary" style="bottom: 0; animation: fade-in-move-up 4s;" data-toggle="modal" data-target="#rules">
            Règles
        </button>
        <button type="button" class="btn btn-primary" style="bottom: 0; right: 0; animation: fade-in-move-up 4s;" data-toggle="modal" data-target="#descr">
            Description du projet
        </button>

        <!-- BOOTSTRAP MODALS WHERE THE CONTENT IS DISPLAYED -->
        <?php if(isset($content)) echo $content; ?>
        
        <!-- Rules Modal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="rules" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Règles</h5>
                    </div>
                        
                    <hr class="style11" />

                    <div class="modal-body">
                        <p>Le but est simple : il faut terminer à temps toutes les énigmes du jeu.
                            <br />
                            <br />1. Préparez une équipe de 1 à 5 joueurs.
                            <br />2. Choisissez un des jeux disponibles (avec chrono ou non).
                            <br />3. Choisissez un maître du jeu connecté.
                            <br />4. Jouez.
                        </p>
                    </div>
                        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-close" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Description Project Modal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="descr" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Description du projet</h5>
                    </div>
                        
                    <hr class="style11" />

                    <div class="modal-body">
                        <p>Ce projet a été crée par Gautier LAISNE dans le cadre du module de Communication Web, enseigné par Baptiste PESQUET, Edwige CLERMONT et Lauren THEVIN à l'Ecole Nationale Supérieure de Cognitique.
                        <br /><br />
                        Les musiques présentes dans les jeux ont été composées par Gautier LAISNE, exclusivement pour ce projet.
                        <br /><br />
                        Toutes les images sont libres de droits.
                        </p>
                    </div>
                        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-close" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>    

        <!-- CINEMATIC EFFECTS -->
        <div class="cinematicBox" style="top: 0; animation-delay: -5s; animation: fade-in-move-down 4s;"></div>
        <div class="cinematicBox" style="bottom: 0; animation: fade-in-move-up 4s;"></div>
        <div class="cinematicBox2" style="left: 0; animation: fade-in-move-right 4s;"></div>
        <div class="cinematicBox2" style="right: 0; animation: fade-in-move-left 4s;"></div>

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
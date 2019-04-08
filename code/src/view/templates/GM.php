<!DOCTYPE html>
<html>
    <head>
        <title>ESCAPE - Administration</title>
        <meta charset="utf-8" />
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- MY CSS -->
        <link rel="stylesheet" href="public/css/styleGM.css">
    </head>

    <body>
        <!-- SIDE MENU -->
        <nav class="col-sm-3">
            <div class="card">
                <img class="card-img-top" src="public/img/home/admin.png" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">Plateforme d'administration</h4>
                    <hr />
                </div>
            </div>

            <a href="gamemaster.php">Jeux en attente</a>
            <a href="gamemaster.php?action=currentGames">Jeux en cours</a>
            <a href="gamemaster.php?action=validatedGames">Jeux validés</a>
            <a href="gamemaster.php?action=refusedGames">Jeux refusés</a>
            <a href="gamemaster.php?action=refusedWaitedGames">Jeux refusés automatiquement</a>
            <a href="gamemaster.php?action=help">Repondre aux messages</a>
            <a href="gamemaster.php?action=logout" class="logout" title="Déconnexion" alt="Déconnexion">Se déconnecter</a>
        </nav>

        <div class="container-fluid">
            <h3><?= $h3 ?></h3>
            <h5><?= $h5 ?></h5>
            <?php if(isset($err)) echo '<div class="alert alert-danger" role="alert">'.$err.'</div>'; ?>            
            <?= $content ?>
        </div>

        <!-- BOOTSTRAP + JQUERY + PARALLAX SCRIPTS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <!-- MY JS SCRIPTS -->
        <script src="public/js/updateMessagesComponentsGM.js"></script>
    </body>
</html>
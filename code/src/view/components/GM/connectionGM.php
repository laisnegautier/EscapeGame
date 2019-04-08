<!DOCTYPE html>
<html>
    <head>
        <title>THE GREAT ESCAPE - Administration</title>
        <meta charset="utf-8" />
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
        <div style="display: flex; flex-direction: column; justify-content: center; height: 100vh; align-items: center;">
        
            <!-- Wrong password -->
            <?php if(isset($err)) { ?>
            <div class="alert alert-danger" style="position: absolute; top: 50px; z-index: 5000;" role="alert"><?= $err ?></div>
            <?php } ?>

            <div class="card" style="width: 400px">
                <img class="card-img-top" src="public/img/home/admin.png" alt="Card image">
                <div class="card-body text-center">
                    <h4 class="card-title text-uppercase">Connexion Administrateur</h4>
                    <form name="connectionGMForm" method="POST" action="gamemaster.php" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control form-control" type="text" maxlength="25" name="nameGM" id="nameGM" placeholder="Login" autofocus required>
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control" type="password" name="passwordGM" id="passwordGM" placeholder="Mot de passe" required>
                            </div>                       
                            <button type="submit" name="connectionGM" class="btn btn-primary">Se connecter</button>
                            
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- BOOTSTRAP + JQUERY + PARALLAX SCRIPTS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </body>
</html>
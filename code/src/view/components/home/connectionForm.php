<?php ob_start(); ?>      
    <div class="card" style="width: 400px">
        <div class="card-body text-center">
            <h5 class="card-title text-uppercase">Connexion</h5>
            <form name="connectionForm" method="POST" action="index.php?action=connection" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control form-control" type="text" maxlength="25" name="nameTeam" id="nameTeamConnection" placeholder="Login" autofocus required />
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control" type="password" name="passwordTeam" id="passwordTeamConnection" placeholder="Mot de passe" required />
                    </div>                       
                    <button type="submit" name="connection" class="btn btn-secondary">Se connecter</button>
                </fieldset>
            </form>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
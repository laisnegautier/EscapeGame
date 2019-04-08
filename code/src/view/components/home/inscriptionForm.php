<?php ob_start(); ?> 

    <span id="errorPasswords" ></span>

    <div class="card" style="width: 400px">
        <div class="card-body text-center">
            <h5 class="card-title text-uppercase">Inscription</h5>
            <form name="inscriptionForm" onsubmit="return validateInscriptionForm()" method="POST" action="index.php?action=inscription" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" type="text" maxlength="25" name="nameTeam" id="nameTeam" placeholder="Nom de l'équipe" autofocus required />
                    </div>
                    <div class="form-group">                            
                        <input class="form-control" type="password" name="passwordTeam" id="passwordTeam" placeholder="Mot de passe" required />
                    </div> 
                    <div class="form-group">                            
                        <input class="form-control" type="password" name="passwordTeamConfirm" id="passwordTeamConfirm" placeholder="Confirmez le mot de passe" required />
                    </div> 
                    
                    <div class="form-group" id="players">
                        <input class="form-control" style="margin-bottom: 16px" type="text" maxlength="25" name="players[]" placeholder="Nom du joueur 1" required />
                    </div>
                    
                    <div style="display: flex; justify-content: space-around">
                        <input type="button" class="btn-secondary" onclick="addPlayer()" value="Ajouter un joueur" />                      
                        <button type="submit" name="inscription" class="btn btn-secondary">S'inscrire</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
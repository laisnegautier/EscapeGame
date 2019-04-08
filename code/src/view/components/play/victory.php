<?php ob_start(); ?>

<div class="container d-flex flex-wrap justify-content-around">    
    <div class="card" style="width: 400px">
        <div class="card-body text-center d-flex flex-column">
            <h5 class="card-title text-uppercase">Victoire !</h5>
            <b>Vous avez gagné la partie !</b>
            <em>N'hésitez pas à laisser une note afin de partager votre appréciation du jeu :</em>

            <form style="margin-bottom: 20px" name="reviewForm" method="POST" action="index.php?action=play&quit=<?= $idGamestate ?>" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group" style="margin: 20px auto 40px auto">
                        <select class="form-control" name="gameReview" style="width: 70px; margin: auto">
                            <option value="5">5/5</option>
                            <option value="4">4/5</option>
                            <option value="3">3/5</option>
                            <option value="2">2/5</option>
                            <option value="1">1/5</option>
                        </select>
                    </div> 
                    <a class="linkGM" href="" onclick="document.forms[0].submit(); return false;" title="Noter le jeu" alt="Noter le jeu">Noter</a>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
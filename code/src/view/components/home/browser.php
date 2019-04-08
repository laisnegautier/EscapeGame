<?php ob_start(); ?>

<div class="container d-flex flex-wrap justify-content-around">    
    <div class="card" style="width: 400px">
        <div class="card-body text-center d-flex flex-column">
            <h5 class="card-title text-uppercase">S'il-vous-plaît</h5>
            <p style="font-weight: 800">Suite à certaines incompatibilités de conception graphique (bouton important non cliquable...), veuillez s'il-vous plaît lancer une partie sous Google Chrome.</p>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
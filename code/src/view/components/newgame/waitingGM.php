<?php ob_start(); ?>

<div class="container d-flex flex-wrap justify-content-around">    
    <div class="card" style="width: 400px">
        <div class="card-body text-center d-flex flex-column">
            <h5 class="card-title text-uppercase">Attente de la validation du jeu</h5>
            <div id="waitGM" style="padding: 20px; display: block"></div>
        </div>
    </div>
</div>
<script>window.onload(setInterval(function() { WaitGM(); }, 1000));
</script>
<?php $content = ob_get_clean(); ?>
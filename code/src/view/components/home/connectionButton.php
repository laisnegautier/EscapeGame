<?php ob_start(); ?>
        
<a href="index.php?action=connection" title="Connexion">
    <button type="button" class="btn btn-primary" style="top: 0; animation: fade-in-move-down 4s;" data-toggle="modal" data-target="#connection">
        Connexion
    </button>
</a>

<?php $linkLeft = ob_get_clean(); ?>
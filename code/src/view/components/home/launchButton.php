<?php ob_start(); ?>

    <a href="index.php?action=choice" title="Lancer une nouvelle partie !" alt="Lancer une nouvelle partie !">
        <button type="button" class="btn btn-primary" style="top: 0; animation: fade-in-move-down 4s;" data-toggle="modal" data-target="#connection">
            Nouvelle partie
        </button>
    </a>

<?php $linkLeft = ob_get_clean(); ?>
<?php ob_start(); ?>     

    <a href="index.php?action=logout" title="Déconnexion" alt="Déconnexion">
        <button type="button" class="btn btn-primary" style="top: 0; right: 0; animation: fade-in-move-down 4s;" data-toggle="modal" data-target="#inscription">
            Se déconnecter
        </button>
    </a>
    
<?php $linkRight = ob_get_clean(); ?>
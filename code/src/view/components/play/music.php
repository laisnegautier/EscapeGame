<span>
    <audio id="player" src="public/music/<?= $gameInfos['locationMusic'] ?>" autoplay loop>
    </audio>
    <button onclick="document.getElementById('player').muted=!document.getElementById('player').muted" class="music">
        <img src="public/img/play/pause.png" title="Couper/remettre le son" alt="Couper/remettre le son" style="width: 50px; opacity: 0.9;" />
    </button>
</span>
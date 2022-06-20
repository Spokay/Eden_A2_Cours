<?php
ob_start();
?>

<section class="homepage">
    <h1>Blog OK, Boomer</h1>
    <p>Bienvenue sur le Blog.</p>
    <p>Il faut être authentifié pour ajouter un article.</p>
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';

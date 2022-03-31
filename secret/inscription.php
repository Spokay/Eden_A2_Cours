<?php
session_start();
?>

<h1>Page d'inscription</h1>
<form action="check.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="pseudo" placeholder="Login">
    <input type="password" name="mdp" placeholder="Password">
    <input type="submit" value="Envoyer">
</form>
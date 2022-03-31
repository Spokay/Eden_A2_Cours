<?php
require('init.inc.php');

?>


<form action="traitement.php" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username">
    <label for="password">Password</label>
    <input type="password" id="password" name="pwd">
    <input type="submit" value="envoyer">
</form>

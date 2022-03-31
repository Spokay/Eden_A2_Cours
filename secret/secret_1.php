<?php

include "inc/function.inc.php";
if (!isUser() && !isAdmin()){
    header('Location:login.php');
}

echo "bienvenue ".$_SESSION['login']." sur la page secrète 1";
?>
<br>
<a href="logout.php?action=disconnect">Se déconnecter</a>

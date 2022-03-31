<?php
include "inc/function.inc.php";

if (!isAdmin() && isUser()){
    header('Location:secret_1.php');

}elseif(!isAdmin() && !isUser()){
    header('Location:login.php');
}

echo "bienvenue ".$_SESSION['login']." sur la page secrète 2";
?>
<a href="logout.php?action=disconnect">Se déconnecter</a>



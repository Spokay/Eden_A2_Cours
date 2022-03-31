<?php
include("inc/init.inc.php");
include("inc/haut.inc.php");

if (isset($_SESSION['membre'])){
    session_destroy();
    header("Location:connexion.php");
}
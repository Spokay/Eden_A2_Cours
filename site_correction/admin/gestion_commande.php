<?php
include("../inc/init.inc.php");
include("../inc/haut.inc.php");

if (!isConnectedAsAdmin()) {
    header("Location:".RACINE_SITE."connexion.php");
}

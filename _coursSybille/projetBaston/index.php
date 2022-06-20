<?php
echo "<pre>";
var_dump($_SERVER);
echo "</pre>";
phpinfo();
require('views/header.php');
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require ('services/GestionCRUD.php');

$gestion = new GestionCRUD();
if (!isset($_GET['action'])){
    $gestion->getListPerso();
}
require('controllers/FrontController.php');

require('views/footer.php');



<?php
session_start();

define("RACINE_SITE", "/Eden_A2_Cours/site/");

$pdo = new PDO("mysql:host=localhost; dbname=site", "root", "");

include("fonction.inc.php");


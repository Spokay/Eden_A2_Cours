<?php
session_start();

define("RACINE_SITE", "/A2_Cours/site_correction/");

$pdo = new PDO("mysql:host=localhost; dbname=site", "root", "");

include("fonction.inc.php");


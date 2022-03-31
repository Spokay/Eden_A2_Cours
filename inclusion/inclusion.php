<?php

// ci dessous sont les deux methodes d'inclusion de fichiers dans un autre fichier php et on des fonctionnalités différentes


//  Include : une erreur de chargement ne bloque pas le chargement de la page

/*include('page.php');
include "page.php";*/

//   Include once

/*include_once('page.php');
include_once 'page.php';*/

//   require : la page est requis pour le chargement de la page sinon fatal error

/*require('page1.php');
require 'page1.php';*/

//   require once

/*require_once('page1.php');
require_once 'page1.php';*/
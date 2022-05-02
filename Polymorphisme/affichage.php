<?php

require_once("Carre.php");
require_once("Rectangle.php");
require_once("Rond.php");
require_once("Triangle.php");

$tableCarree = new Carre(array('nom'=>'Table carrée', 'prix'=>129,'couleur'=>'blue','matière'=>'bois', 'image'=>''), 12);

echo $tableCarree->getSurface();
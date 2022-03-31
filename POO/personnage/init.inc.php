<?php

require('DatabaseMySQL.php');
require('Personnage.php');
require('PersonnageManager.php');
require('Partie.php');
$db = new DatabaseMySQL('localhost', 'exo_poo', 'root', '');
$PersoManager = new PersonnageManager($db);
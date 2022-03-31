<?php

require('DatabaseMySQL.php');
require('Personnage.php');
require('PersonnageManager.php');
$db = new DatabaseMySQL('localhost', 'exo_poo', 'root', '');
$manager = new PersonnageManager($db);
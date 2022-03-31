<?php

require('Impots.php');

if(!empty($_POST)){
    extract($_POST);
    $personne = new Impots($revenu, $nom);
    $personne->AfficheImpots();
}




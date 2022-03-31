<?php
$number = 15;
if ($number % 3 === 0 && $number % 5 === 0){
    echo 'le nombre est a la fois un multiple de 3 et de 5';
}
echo '<br>';
$age = 25;
$sexe = 'femme';
if ($sexe === 'femme' && $age >= 21 && $age <= 40){
    echo 'bienvenue a vous sur ce site vous avez entre 21 et 40 ans ';
}
echo '<br>';
$prix_table = 150;
$prix_armoire = 350;
$nombreDeMobilier = 10;
echo ($prix_armoire * $nombreDeMobilier);
echo '<br>';
if ($prix_armoire > $prix_table) {
    echo 'le prix de l\'armoire est supérieur a celui de la table';
}elseif ($prix_armoire < $prix_table) {
    echo 'le prix de la table est supérieur';
}else{
    echo 'le prix de la table est égal a celui de l\'armoire';
}
echo '<br>';

$heure = 5;
if ($heure < 0 || $heure > 23){
    echo 'cette heure n\'est pas correcte';
}else{
    if ($heure > 6){
        if ($heure > 12){
            echo 'c\'est l\'apres midi';
        }else{
            echo 'c\'est le matin';
        }
    }else{
        echo 'c\'est la nuit';
    }
}

echo '<br>';

$pays = 'France';
switch ($pays){
    case 'France':
        echo 'je suis en France';
        break;
    case 'Italie':
        echo 'je suis en Italie';
        break;
    case 'espagne':
        echo 'je suis en espagne';
        break;
    case 'angleterre':
        echo 'je suis en angleterre';
        break;
    default:
        echo 'je ne suis nulle part';
}

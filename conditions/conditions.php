<?php

// les conditions me permettent de vérifier si ce qui setrouve dans les parenthèses est vrais on éxécute le code qui se trouve dans les accolades sinon on n'éxécute pas

$age = 20;
// ici on vérifie si la condition est vraie (true) ou pas (false)
/*var_dump($age > 18);
if ($age > 18){
    echo 'vous etes majeur';
}else {
    echo 'la condition n\'est pas vérifiée';
}*/


$prenom = 'jean';
// il faut que toutes les conditions soit vraies pour éxécuter ce qui se trouve dans les accolades
/*if ($age > 18 && $prenom === 'jean'){
    echo "Bienvenue sur notre site  $prenom ";
}else{
    echo "vous n'etes pas accepté";
}*/

// l'opérateur xor ne rentre dans le if que si il y a UNE SEUL condition qui est vraie

/*if ($age > 18 xor $prenom === 'paul'){
    echo "Bienvenue sur notre site  $prenom ";
}else{
    echo "vous n'etes pas accepté";
}*/

/*
if ($age === 20){
    echo 'bienvenue';
}elseif ($age > 18){
    echo 'bienvenue aussi';
}else{
    echo 'vous n\'etes pas la bienvenue';
}*/



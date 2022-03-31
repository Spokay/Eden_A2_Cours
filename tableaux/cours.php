<?php

/* ------ tableaux numérotés ------ */

/*$personnes = [

];*/

/*$personnes = ['emmanuel', 'macron', 45];*/


/*$personnes[] = 'jean';
$personnes[] = 'marie';
$personnes[] = 'paul';
$personnes[] = 'dominique';*/

/*echo '<pre>';
//print_r($personnes);
var_dump($personnes);
echo '</pre>';*/

// count() et sizeof() permettent de compter les elements d'un tableau

// exemple

/*for ($i = 0; $i < count($personnes); $i++){
    echo "<li>$personnes[$i]</li>";
}

foreach ($personnes as $key => $value){
    echo "$key - $value<br>";
}*/

/* ------ tableaux associatifs ------ */

/*$personnes = ['prenom'=>'emmanuel', 'nom'=>'macron', 'age'=>45];

// le signe '=>' veux dire 'associer à'

echo '<pre>';
//print_r($personnes);
var_dump($personnes);
echo '</pre>';

echo $personnes['nom'];*/

/* ------ tableaux multidimensionnels ------ */

$personnes = [
    ['prenom'=>'emmanuel', 'nom'=>'macron', 'age'=>45],
    ['prenom'=>'alain', 'nom'=>'delon', 'age'=>36],
    ['prenom'=>'jaques', 'nom'=>'chirac', 'age'=>85]
];

echo "je m'appeles ".$personnes[1]['prenom'].' '.$personnes[1]['nom']." et j'ai ". $personnes[1]['age'] ." ans ";
echo "$personnes";
echo '<pre>';
//print_r($personnes);
var_dump($personnes);
echo '</pre>';

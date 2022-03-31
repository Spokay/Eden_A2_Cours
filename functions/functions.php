<?php

$texte = "bonjour tous le monde";

echo substr($texte, 8) . '<br>';
echo substr($texte, 8, 4) . '<br>';
// paramètre 1 = là ou on commence
// paramètre 2 = nombre de caractère a récupérer


$prenom = '';

if (isset($prenom)){
    echo 'la variable est définie';
}else{
    echo "la variable n'est pas définie";
}

$nom = '<br>jean';
echo str_repeat($nom, 5);

echo '<br>';

$str = 'bonjour tous le monde';

echo str_replace('bonjour', 'bonsoir', $str);

echo '<br>';

// permet de donner la position de départ d'une chaine de caractère dans une variable
echo strpos($str, 'tout');

//permet de formater les retours à la ligne en entité <br>
$str2 = 'bonjour
 tous
 le
 monde';

echo nl2br($str2);
echo '<br>';

echo strtolower($str);
echo '<br>';
echo strtoupper($str);
echo '<br>';
// fonctions utilisateurs

/*function addition($para1, $para2){
    $result = $para1 + $para2;
    echo $result;
}

addition(3, 4);

echo '<br>';*/


/* avec un paramètre par défaut on peut éxécuter la fonction avec 1 seul argument
function addition($para1, $para2 = 15){
    $result = $para1 + $para2;
    echo $result;
}
addition(10);
echo '<br>';*/

// variables globales
/*$globVar1 = 4;
$globVar2 = 8;

function addition(){
    global $globVar1, $globVar2;
    $result = $globVar1 + $globVar2;
    echo $result;
}

addition();

echo '<br>';*/


$arg1 = 4;
$arg2 = 8;

function ref($para1, &$para2){
    $para2 = 20;
    return $para2 + $para1;
}
$res = ref($arg1, $arg2);
var_dump($arg2);
echo '<br>';

/* ------ Suite sur les fonctions  ------ */

//fonctions implode et explode

$txt = ['Jean', 'Marc', 'Alain'];
$txt2 = 'bonjour';


$tabToTexte = implode('.',$txt); // cette fonction convertis un tableau en chaine de caractère

echo $tabToTexte;
echo '<br>';

$texteToTab = explode('o' ,$txt2); // cette fonction convertis une chaine de caractère en tableau

var_dump($texteToTab);

$array1 = ['a', 'b', 'c'];
$array2 = ['d', 'e', 'f'];
echo '<pre>';
print_r(array_merge($array1, $array2));
echo '</pre>';

$array1 = ['a', 'b', 'c'];
$array2 = ['d', 'e', 'f'];
echo '<pre>';
print_r(array_combine($array1, $array2));
echo '</pre>';


$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$arr2 = [1, 2, 3, 4, 5, 6, 8, 8, 10, 10];
$pers = [
    'prenom' => 'emmanuel',
    'nom' => 'macron'
];
$pers2 = [
    'prenom' => 'Hugo',
    'nom' => 'brsg'
];
// sort($arr) permet de mofifier un tableau dans l'ordre croissant et de retourner un boolean
/*sort($arr)*/
// rsort permet de mofifier un tableau dans l'ordre décroissant et de retourner un boolean
var_dump(rsort($arr));

// sort($arr, SORT_REGULAR); le paramètre SORT_REGULAR permet de faire le test pour savoir si la tableau est en ordre croissant mais ne modifie pas les données du tableau
var_dump($arr);

echo '<br>';
/*$result = array_diff_assoc($pers, $pers2);*/
$result = array_unique($arr2);
var_dump($result);

echo '<br>';

$voitures = [
    'renault' => 'R18',
    'mercedes' => 'C5',
    'fiat' => '500'
];
// la fonction in_array() permet de vérifier si une valeur se trouve dans un tableau
// le troisième parametre de in_array() permet de vérifier avec le type de la valeur aussi

if (in_array('R18', $voitures)){
    echo 'R18 est bien dans voitures';
}else{
    echo 'R18 n\'est pas dans voitures';
}

echo '<br>';

// array_key_exist()
if (array_key_exists('renault', $voitures)){
    echo 'la key existe bien dan ce tableau';
}else{
    echo 'la key n\'existe pas dans ce tableau';
}


// ctype_upper($word) permet de savoir si une chaine de caractère est en uppercase : retourne un boolean

// ctype_lower($word) permet de savoir si une chaine de caractère est en lowercase : retourne un boolean
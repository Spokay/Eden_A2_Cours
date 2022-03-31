<?php
//exo 1
/*$arr = [
    'France' => 'Paris',
    'Allemagne' => 'Berlin',
    'Italie' => 'Rome'
];

foreach ($arr as $key => $value){
    echo "<li>$key : $value</li>";
}*/

//exo 2



/* function alea(){
    for ($i = 0; $i < 10; $i++) {
        $arr[] = rand(1, 100);
        if ($arr[$i] == 42) {
            echo 'le nombre 42 fait partie du tableau';
        }
    }
    echo '<br>';
    var_dump($arr);
}
alea();*/


//exo 3

/*$arr1 = [];
$arr2 = [];
for ($i = 0; $i < 10; $i++) {
    global $arr1, $arr2;
    $arr[] = rand(0, 100);
    if ($arr[$i] < 50) {
        $arr1[] = $arr[$i];
    }elseif($arr[$i] >= 50){
        $arr2[] = $arr[$i];
    }
}
var_dump($arr1);
echo '<br>';
var_dump($arr2);

echo '<br>';*/

//exo 4
/*
$pays_population = array(
    'France' => 67595000,
    'Suede' => 9998000,
    'Suisse' => 8417000,
    'Kosovo' => 1820631,
    'Malte' => 434403,
    'Mexique' => 122273500,
    'Allemagne' => 82800000,
);

foreach ($pays_population as $key => $value){
    if ($value >= 20000000){
        echo "$key : $value <br>";
    }
}*/

//exo 8

$pays_population = array(
    'France' => 67595000,
    'Suede' => 9998000,
    'Suisse' => 8417000,
    'Kosovo' => 1820631,
    'Malte' => 434403,
    'Mexique' => 122273500,
    'Allemagne' => 82800000,
);/*function dernierElementTableau(array $arr){
    if (empty($arr)){
        return null;
    }
    else{
        return array_pop($arr);
    }
}

var_dump(dernierElementTableau($pays_population));*/

/*function avantDernierElementTableau(array $arr){
    if (empty($arr)){
        return null;
    }
    array_pop($arr);
    $lastElement = null;
    foreach ($arr as $value){
        $lastElement = $value;
    }
    return $lastElement;
}

var_dump(avantDernierElementTableau($pays_population));*/

/*function dernierElementTableau2(array $arr){
    if (empty($arr)){
        return null;
    }
    $lastElement = null;
    foreach ($arr as $value){
        $lastElement = $value;
    }
    return $lastElement;
}

var_dump(dernierElementTableau2($pays_population));*/

//exo 9

/*function verificationPassword(string $pass){
    if (strlen($pass) < 8){
        return true;
    }else{
        return false;
    }
}

var_dump(verificationPassword('ceciest'));
echo '<br>';
var_dump(verificationPassword('ceciestunesringlongue'));*/

//exo 10

/*function remplacerLesLettres(string $word){
    $arr = ['e', 'i', 'o'];
    $arr2 = [3, 1, 0];
    $replaced = str_replace($arr, $arr2, $word);
    return $replaced;
}
echo (remplacerLesLettres('Bonjour les amis'));*/


//exo 12

/*for ($li = 0; $li < 10; $li++){
    for ($ei = 0; $ei < $li; $ei++){
        echo '*';
    }
    echo '<br>';
}*/


/* for($i = 1; $i < 10; $i++){
    echo str_repeat('*', $i).'<br>';
 }

echo '<br>';
$downCount = 5;
for ($li = 0; $li < 10; $li++){
    global $downCount;
    if ($li < 5){
        for ($ei = 0; $ei <= $li; $ei++){
            echo '*';
        }
    }else if ($li >= 5){
        for ($di = 0; $di < $downCount; $di++){
            echo '*';
        }
        $downCount--;
    }

    echo '<br>';
}
echo '<br>';

echo "<div style='display: flex; justify-content: space-between; flex-direction: column;'>";
for ($li = 0; $li < 8; $li++){
    echo "<div>";
    if ($li == 0){
        echo str_repeat("<span>&nbsp;</span>", 2);
        echo str_repeat('*', 3);
        echo str_repeat("<span>&nbsp;</span>", 2);
    }elseif ($li == 3){
        echo str_repeat('*', 5);
    }else{
        echo '*';
        echo str_repeat("<span>&nbsp;</span>", 6);
        echo '*';
    }
    echo "</div>";
    echo '<br>';
}
echo "</div>";*/

// exo 14
/*
function countr(string $orga){
    $counter = 0;
    for ($i = 0; $i < strlen($orga); $i++){
        if ($orga[$i] === 'r'){
            $counter++;
        }
    }
    return $counter;
}
echo countr('organiser');*/

//exo 15

/*echo "<table>";
for ($i = 1;$i < 10; $i++){
    echo "<tr>";
    for ($j = 1; $j < 10;$j++){
        if (($j + $i) % 2 !== 0){
            echo "<td style='background-color: black; padding: 40px; border: 1px solid #000'></td>";
        }else{
            echo "<td style='background-color: white; padding: 40px; border: 1px solid black'></td>";
        }
    }
    echo "</tr>";
}
echo "</table>";*/

//exo 17

/*function palyndrome(string $word){
    $splittedWord = str_split($word);
    $reversedWord = array_reverse($splittedWord);
    $res = implode($reversedWord);
    if ($res === $word){
        return "$word est un palydrome";

    }else{
        return "$word n\'est pas un palydrome";
    }
}
echo palyndrome('lol');*/

//exo 18

/*function islower(string $word){
    $uppWord = strtoupper($word);
    $lowWord = strtolower($word);
    if ($uppWord === $word){
        echo "cette chaine de caractère est en uppercase";
    }elseif ($lowWord === $word){
        echo "cette chaine de caractère est en lowercase";
    }else{
        echo "cette chaine de caractère a des lettes en uppercase et d'autres en lowercase";
    }
//    if (ctype_upper($word)){
//        echo "cette chaine de caractère est en uppercase";
//    }elseif(ctype_lower($word)){
//        echo "cette chaine de caractère est en lowercase";
//    }else{
//        echo "cette chaine de caractère a des lettes en uppercase et d'autres en lowercase";
//    }
}
islower('rien');*/

//exo 19

/*$charSubSetsBase = array(
    'abcdefghijklmnopqrstuvwxyz',
    'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
    '0123456789',
    '!@#$%^&*()_+{}|:">?<[]\\\';,.`~',
    'µñ©æáßðøäåé®þüúíóö'
);
$charSubSets = array(
    'abcdefghijklmnopqrstuvwxyz',
    'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
    '0123456789',
    '!@#$%^&*()_+{}|:">?<[]\\\';,.`~',
    'µñ©æáßðøäåé®þüúíóö'
);
$arrayPass = implode($charSubSets);
$choosedLetters = [];
function passwordGenerator(string &$charSubSets ,$length) {
    global $choosedLetters;
    for ($i = 0; $i < $length; $i++){
        $choosedLetters[] = substr($charSubSets, rand(0, strlen($charSubSets)), 1);
    }

    shuffle($choosedLetters);
    echo implode($choosedLetters);
}
passwordGenerator($arrayPass ,25);*/


/*$range1 = range('a', 'z');
$range2 = range('A', 'Z');
$range3 = range(0, 9);
$char = ['&', '!', '?', '@', '$'];
$tab = array_merge($range1, $range2, $range3, $char);
shuffle($tab);
for($i = 0; $i <= 15; $i++){
    $res[] = $tab[$i];
}
$str = implode($res);
echo $str;*/

// exo 2O

/*$array = [];
$value = 2;
function createArray(&$arr, &$value){
    for ($i = 20; $i <= 25; $i++){
        $arr[$i] = $value;
        $value++;
    }
    return $arr;
}
echo "<pre>";
echo print_r(createArray($array, $value));
echo "</pre>";*/


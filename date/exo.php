<?php

/*
$birth = mktime(0, 0, 0, 7, 30, 2003);
$res = time() - $birth;
$resAge = $res / 3600 / 24 / 365;
var_dump(floor($resAge));


var_dump(checkdate(2, 29, 2010));


$may = mktime(0, 0, 0, 5, 1, 2015);
if (getdate($may)['weekday'] == 'Friday'){
    echo "Week-end prolongé ! <br>";
}
echo date('w', $may);
$avant = microtime(true);
for ($i = 0; $i < 10; $i++){
    echo "$i <br>";
}
$apres = microtime(true);
var_dump($apres - $avant);*/

$january = mktime(23, 31, 1, 1, 25, 2016);

echo date('r', $january) . "<br>";
// le plus opti ci dessous
$now = new DateTime();
$now->format('r');

echo date('l/F/Y', $january) . "<br>";
echo date('d/M/Y', $january) . "<br>";
echo date('d-m-y', $january) . "<br>";
echo date('H\h: i\m: s\s', $january) . "<br>";
echo date('r', $january) . "<br>";
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, "fr");
echo strftime('%A %d %B %Y, %H:%M', $january) . "<br>";

/*setlocale(LC_TIME, 'fr_FR');
date_default_timezone_set('Europe/Paris');
echo utf8_encode(strftime('%A %d %B %Y, %H:%M'));*/

$weekdays = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
$months = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septempbre', 'Octobre', 'Novembre', 'Decembre'];
$date = explode('|', date('w|d|n|Y', time()));
echo $weekdays[$date[0]].' '.$date[1].' '.$months[$date[2] - 1].' '.$date[3];

/*$dayI = date('w', $january);
$monthI = date('m', $january);
$monthInt = intval($monthI);
$englishDate = date('\f d \g Y, H:i', $january);
$englishDate = str_replace('f', $weekdays[($dayI - 1)], $englishDate);
$englishDate = str_replace('g', $months[($monthInt - 1)], $englishDate);
echo $englishDate . "<br>";

$nov = mktime(0, 0, 0, 11, 6, 1975);
echo "Le 6 novembre 1975 était un ".$weekdays[date('w', $nov)];*/


?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>






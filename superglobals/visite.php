<?php

if (isset($_COOKIE['compteur_heure'])){
    $date = unserialize($_COOKIE['compteur_heure']);
    $date[] = time();
    $res = serialize($date);
    setcookie('compteur_heure', $res);
    $date = unserialize($_COOKIE['compteur_heure']);
    echo "<ul>";
    echo "vous avez visité ".count($date)." fois cette page voici les détails : ";
    foreach ($date as $value){
        echo "<li>". date('d-m-Y H:i:s',$value) ."</li>";
    }
    echo "</ul>";
}else{
    $date[] = time();
    setcookie('compteur_heure', serialize($date));
    echo "votre première visite : ".date('d-m-Y H:i:s', time());
}
    
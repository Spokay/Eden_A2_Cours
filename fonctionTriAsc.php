<?php

function fonctionTriAsc($tab){
    $temp = 0;

    for ($i = 0; $i < count($tab); $i++) {
        for ($j = $i + 1; $j < count($tab); $j++) {
            if ($tab[$i] > $tab[$j]) {
                $temp = $tab[$i];
                $tab[$i] = $tab[$j];
                $tab[$j] = $temp;
            }
        }
    }
    return $tab;
}
<?php
declare(strict_types=1);
function concatenation(String $para1,String $para2){
    $result = "$para1 <strong>$para2</strong>";
    return $result;
}
echo concatenation('Antoine', 'Griezmann');
echo '<br>';
function somme($para1 , $para2 = 6){
    return $para2 + $para1;
}
echo somme(4);
echo '<br>';
function estIlMajeur(Int $nb1){
    if ($nb1 >= 18){
        return true;
    }elseif($nb1 < 18){
        return false;
    }else{
        return 'je ne sait pas';
    }
}
var_dump(estIlMajeur(19));
echo '<br>';
function plusGrand(Int $nb1,Int  $nb2):Int{
    if ($nb1 > $nb2){
        return $nb1;
    }elseif($nb2 > $nb1){
        return $nb2;
    }else{
        return 0;
    }
}
echo plusGrand(10, 20);
echo '<br>';
function plusPetit(Int $nb1,Int $nb2,Int $nb3){
    if ($nb1 < $nb2 && $nb1 < $nb3){
        $resultat = $nb1;
    }elseif ($nb2 < $nb3 && $nb2 < $nb1){
        $resultat = $nb2;
    }else{
        $resultat = $nb3;
    }
    return $resultat;
}
echo plusPetit(5, 15, 2);
echo '<br>';
function season(String $currentSeason,Int $temperature){
    if ($temperature < -1 || $temperature > 1){
        echo "nous sommes en $currentSeason et il fait $temperature degrés .";
    }else{
        echo "nous sommes en $currentSeason et il fait $temperature degré .";
    }
}
season('hiver', 20);
echo '<br>';
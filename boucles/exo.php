<?php

// exo 1

/*for ($i = 100; $i >= 5; $i--) {
    echo $i.'<br>';
}*/

// exo 2
/*
for ($i = 20; $i <= 100; $i++) {
    if ($i == 50){
        echo "<span style='color:red;'>$i</span> <br>";
        continue;
    }
    echo $i.'<br>';
}*/

// exo 3

/*for ($i = 2000; $i >= 1930; $i--){
    echo $i.'<br>';
}*/

//exo 4

/*for ($i = 1; $i <= 100; $i++){
    echo "<h1>Titre à afficher 100 fois</h1><br>";
}*/

//exo 5

/*for ($i = 1; $i <= 100; $i++){
    echo "<h1>Je m'affiche pour la $i ème fois</h1><br>";
}*/

//exo 6
/*
echo "<select>";
    for ($i = 1; $i <= 31; $i++){
        echo "<option>$i</option>";
    }
echo "<select>";*/

// exo 7

/*for ($i = 1; $i <= 10; $i++){
    $res = 5 * $i;
    echo "5 x $i = $res <br>";
}*/

// exo 8
/*
for ($i1 = 1; $i1 <= 5; $i1++){
    for ($i2 = 0; $i2 < $i1; $i2++){
        echo $i1;
    }
    echo '<br>';
}*/

// exo 9

/*for ($i = 0; $i <= 20; $i+= 2){
    if ($i == 10){
        echo "<strong>$i</strong> <br>";
    }else{
        echo $i.'<br>';
    }
}*/

/*$totalCount = 1;
$colorRedCount = 0;
$colorGreenCount = 9;
echo "<table>";
    for ($lineI = 1; $lineI < 11; $lineI++){
        echo "<tr>";
        for ($cellI = 0; $cellI < 10; $cellI++){
            global $totalCount;
            if ($cellI === $colorGreenCount){
                echo "<td style='background-color: green; width: 50px; height: 50px; border: 1px solid black; text-align: center'>$totalCount</td>";
            }
            elseif ($cellI === $colorRedCount){
                echo "<td style='background-color: red; width: 50px; height: 50px; border: 1px solid black; text-align: center'>$totalCount</td>";
            }else{
                echo "<td style='width: 50px; height: 50px; border: 1px solid black; text-align: center'>$totalCount</td>";
            }
                $totalCount++;
        }
        $colorRedCount++;
        $colorGreenCount--;
        echo "</tr>";
    }
echo "</table>";*/

$totalCount = 1;
$colorRedCount = 1;
$colorGreenCount = 10;
echo "<table>";
for ($lineI = 1; $lineI < 11; $lineI++){
    echo "<tr>";
    for ($cellI = 1; $cellI < 11; $cellI++){
        global $totalCount;
        $calcule = $lineI * $cellI;

        if ($lineI === 1){
            if ($totalCount === 1){
                echo "<td style='background-color: red; width: 50px; height: 50px; border: 1px solid black; text-align: center'>$calcule</td>";
            }elseif ($totalCount === 10){
                echo "<td style='background-color: green; width: 50px; height: 50px; border: 1px solid black; text-align: center'>$calcule</td>";
            }else{
                echo "<td style='background-color: yellow; width: 50px; height: 50px; border: 1px solid black; text-align: center'>$calcule</td>";
            }
        }
        else if($cellI === 1){
            if ($lineI === 1){
                echo "<td style='background-color: red; width: 50px; height: 50px; border: 1px solid black; text-align: center'>$calcule</td>";
            }else if ($lineI === 10){
                echo "<td style='background-color: green; width: 50px; height: 50px; border: 1px solid black; text-align: center'>$calcule</td>";
            }else{
                echo "<td style='background-color: blue; width: 50px; height: 50px; border: 1px solid black; text-align: center'>$calcule</td>";
            }
        }
        elseif ($cellI === $colorGreenCount){
            echo "<td style='background-color: green; width: 50px; height: 50px; border: 1px solid black; text-align: center'>$calcule</td>";
        }
        elseif ($cellI === $colorRedCount){
            echo "<td style='background-color: red; width: 50px; height: 50px; border: 1px solid black; text-align: center'>$calcule</td>";
        }else{
            echo "<td style='width: 50px; height: 50px; border: 1px solid black; text-align: center'>$calcule</td>";
        }
        $totalCount++;
    }
    $colorRedCount++;
    $colorGreenCount--;
    echo "</tr>";
}
echo "</table>";
<?php


/*$ressource = fopen('fichier.txt', 'r+');
$compteur = fgets($ressource);
$newNumber = $compteur + 1;
if (!$ressource) {
    echo "impossible d'ouvrir le fichier";
}else{
    file_put_contents('fichier.txt', $newNumber);
}
fclose($ressource);
echo $compteur;*/

/*if (file_exists('fichier.txt')){
    if ($id_file = fopen('fichier.txt', 'r')){
        $nb = file_get_contents('fichier.txt');
        $nb++;
        file_put_contents('fichier.txt', $nb);
        fclose($id_file);
    }
}else{
    $nb = 0;
    $id_file = fopen('fichier.txt', 'w');
    fwrite($id_file, $nb);
    fclose($id_file);
}
echo file_get_contents('fichier.txt');*/

/*if (!empty($_POST)){
    extract($_POST);
    $actualDate = new DateTime('now');
    $actualDate = $actualDate->format('d/m/Y H:i:s');
    $tab = [$prenom,' ', $nom, ' ', $actualDate];
    if (file_exists('fichier.txt')){
        if ($id_file = fopen('fichier.txt', 'a')){
            foreach ($tab as $value){
                fwrite($id_file, $value);
            }
            fwrite($id_file, "\n");
            fclose($id_file);
        }


    }else{
        $id_file = fopen('fichier.txt', 'w');
        foreach ($tab as $value){
            fwrite($id_file, $value);
        }
        fwrite($id_file, "\n");
        fclose($id_file);
    }
}
if (file_exists('fichier.txt')){
    $file = fopen('fichier.txt', 'r');
    $compteur = 1;
    echo "<table border='1'>";
    echo "<th>numero</th><th>prenom</th><th>nom</th><th>date</th><th>heure</th>";

    $data = file('fichier.txt');
    foreach ($data as $valeur) {
        echo "<tr>";
        $line = explode(' ', $valeur);
        echo "<td>$compteur</td>";
        foreach ($line as $val) {
            echo "<td>$val</td>";
        }
        echo "</tr>";
        $compteur++;
    }

    echo "</table>";
    fclose($file);
}*/

// correction exo
$i = 1;
if(!empty($_POST)){

    $ressource = fopen('fichier.txt', 'a');
    extract($_POST);
    $date = date('d/m/Y H:i:s', time());
        fwrite($ressource, $prenom.";".$nom.";".$date."\n");

    fclose($ressource);
}if (file_exists('fichier.txt')){
    $ressource1 = fopen('fichier.txt', 'r+');
    echo "<table><th>numéro</th><th>prenom</th><th>nom</th><th>date</th>";
    while($ligne = fgets($ressource1, 100)){
        $val = explode(";", $ligne);
        var_dump($val);
        echo "<tr><td>$i</td><td>$val[0]</td><td>$val[1]</td><td>$val[2]</td></tr>";
        $i++;
    }
    fclose($ressource1);
    echo "</table>";
}

?>

<form action="" method="post">
    <input type="text" name="prenom" id="prenom">
    <input type="text" name="nom" id="nom">
    <input type="submit">
</form>

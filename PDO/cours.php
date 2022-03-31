<?php

$pdo = new PDO('mysql:host=localhost; dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
echo "<pre>";
print_r($pdo);
print_r(get_class_methods($pdo));
echo "</pre>";

/* ------ insertion ------ */

/*$resultat = $pdo->exec("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire) VALUES('Jack', 'Daniel', 'm', 'direction', '2021-02-03', 5500)");*/

/*echo $resultat . "nombre des resultats affectés par la requête <br>";*/

/* ------ mise a jour ------ */
/*$resultat =$pdo->exec("UPDATE employes SET salaire = 2500 WHERE id_employes = 802");*/

/*echo $resultat . "nombre des resultats affectés par la requête <br>";*/

/* ------ suppression ------ */

/*$resultat = $pdo->exec("DELETE FROM employes WHERE prenom = 'Jack' AND nom = 'Daniel' AND id_employes != '994'");

echo $resultat . "nombre des resultats affectés par la requête <br>";*/

/* ------ Récuperation de données ------ */

$resultat = $pdo->query("SELECT * FROM employes");
echo "<pre>";
print_r($resultat);
echo "</pre>";

$data = $resultat->fetch(PDO::FETCH_ASSOC);
/*echo "<table border='1'>";
/*echo "<thead>";
foreach ($data[0] as $elm => $valeur){
    echo "<th>$elm</th>";
}
echo "</thead>";
foreach ($data as $key => $val) {
    echo "<tr>";
    foreach ($val as $cle => $value){
            echo "<td>$value</td>";

    }
    echo "</tr>";
}*/
//echo "</table>";


/*echo "<pre>";
print_r($data);
echo "</pre>";*/

echo "<table border='1'>";
echo "<thead>";
for ($i = 0; $i < $resultat->columnCount(); $i++){
    $column = $resultat->getColumnMeta($i);
    echo "<th>$column[name]</th>";
}
echo "</thead>";
while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    foreach ($donnees as $valeur2){
        echo "<td>$valeur2</td>";
    }
    echo "</tr>";
}

echo "</table>";

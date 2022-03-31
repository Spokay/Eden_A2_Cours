<?php

$pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$nbAbo = $pdo->query("SELECT COUNT(*) AS nb_abonne FROM abonne")->fetch(PDO::FETCH_ASSOC);
echo "il y a  $nbAbo[nb_abonne] abonnés<br>";
$nbLivre = $pdo->query("SELECT COUNT(*) AS nb_livre FROM livre")->fetch(PDO::FETCH_ASSOC);
echo "il y a $nbLivre[nb_livre] livres<br>";
$nbEmprunt = $pdo->query("SELECT COUNT(*) AS nb_emprunt FROM emprunt")->fetch(PDO::FETCH_ASSOC);
echo "il y a $nbEmprunt[nb_emprunt] emprunts<br>";

echo "<hr>";
$nonRendu = $pdo->query("SELECT l.titre,l.id_livre FROM livre l, emprunt e WHERE l.id_livre = e.id_livre AND e.date_rendu IS NULL");
echo "les livres n’ayant pas été rendus à la bibliothèque sont : <br>";
while ($data = $nonRendu->fetch(PDO::FETCH_ASSOC)){
    echo "l'id est $data[id_livre] et le titre du livre est $data[titre] <br>";
}
echo "<hr>";

$livreChloe = $pdo->query("SELECT DISTINCT(l.id_livre) FROM livre l, emprunt e, abonne a WHERE l.id_livre = e.id_livre AND e.id_abonne = a.id_abonne AND a.prenom = 'Chloe'");
echo "le numero des livres que chloe a emprunté à la bibliotheque sont : <br>";
while ($chloeLivre = $livreChloe->fetch(PDO::FETCH_ASSOC)){
    echo "l'id est $chloeLivre[id_livre]<br>";
}
echo "<hr>";

$alphonseDaudet = $pdo->query("SELECT DISTINCT(a.prenom) FROM abonne a, emprunt e, livre l WHERE a.id_abonne = e.id_abonne AND e.id_livre = l.id_livre AND l.auteur = 'ALPHONSE DAUDET'");
echo "les personnes ayant emprunté un livre d'alphonse daudet sont : <br>";
while ($dataAlph = $alphonseDaudet->fetch(PDO::FETCH_ASSOC)){
    echo "$dataAlph[prenom]<br>";
}
echo "<hr>";

$nonRenduChloe = $pdo->query("SELECT DISTINCT(l.titre) FROM abonne a, emprunt e, livre l WHERE a.id_abonne = e.id_abonne AND e.id_livre = l.id_livre AND a.prenom = 'Chloe' AND e.date_rendu IS NULL");
echo "les livres qui n'ont pas été rendu par chloe sont : <br>";
while ($dataNonRenduChloe = $nonRenduChloe->fetch(PDO::FETCH_ASSOC)){
    echo "$dataNonRenduChloe[titre]<br>";
}
echo "<hr>";
// non reussis
$pasEmprunte = $pdo->query("SELECT e.id_livre, l.titre FROM emprunt e INNER JOIN livre l, abonne a WHERE e.id_abonne = a.id_abonne AND e.id_livre NOT IN(SELECT e.id_livre FROM emprunt e, livre l, abonne a WHERE e.id_livre = l.id_livre AND e.id_abonne = a.id_abonne AND a.prenom = 'Chloe')");
echo "les livres qui n'ont pas ete emprunte par chloe sont : <br>";
$res = [];
while ($dataPasEmprunte = $pasEmprunte->fetch(PDO::FETCH_ASSOC)){
    $res[] = $dataPasEmprunte['titre'];
}
$unique  = array_unique($res);
foreach ($unique as $key => $value){
    echo "$value <br>";
}
echo "<hr>";

$prenomMax = '';
$max = 0;
$emprunteMax = $pdo->query("SELECT a.prenom, COUNT(*) AS emprunts FROM abonne a, emprunt e, livre l WHERE a.id_abonne = e.id_abonne AND l.id_livre = e.id_livre GROUP BY a.prenom");
echo "le prenom de l'abonne ayant emprunte le plus de livres est :<br>";
while ($dataEmprunteMax = $emprunteMax->fetch(PDO::FETCH_ASSOC)){
    if ($max < $dataEmprunteMax['emprunts']){
        $max = $dataEmprunteMax['emprunts'];
        $prenomMax = $dataEmprunteMax['prenom'];
    }
}
echo "$prenomMax : $max";

echo "<hr>";

$distinctLivre = $pdo->query("SELECT DISTINCT(l.titre) FROM livre l, emprunt e, abonne a WHERE e.id_livre = l.id_livre AND e.id_abonne = a.id_abonne AND a.prenom = 'Guillaume'");
echo "les livres différents empruntés par guillaumes sont : <br>";
while ($dataDistinctLivre = $distinctLivre->fetch(PDO::FETCH_ASSOC)){
    echo "$dataDistinctLivre[titre]<br>";
}
echo "<hr>";

$uneVie = $pdo->query("SELECT DISTINCT(a.prenom) FROM livre l, emprunt e, abonne a WHERE e.id_livre = l.id_livre AND e.id_abonne = a.id_abonne AND l.titre = 'Une vie' AND e.date_sortie LIKE '2011%'");
echo "les abonnés ayant emprunté Une Vie sur l'année 2011 sont: <br>";
while ($dataUneVie = $uneVie->fetch(PDO::FETCH_ASSOC)){
    echo "$dataUneVie[prenom]<br>";
}
echo "<hr>";

$nbEmpruntAbonne = $pdo->query("SELECT a.prenom, COUNT(*) AS emprunts FROM abonne a, emprunt e, livre l WHERE a.id_abonne = e.id_abonne AND l.id_livre = e.id_livre GROUP BY prenom");
echo "le nombre de livres empruntés par abonnés sont : <br>";
while ($dataNbEmpruntAbonne = $nbEmpruntAbonne->fetch(PDO::FETCH_ASSOC)){
    echo "$dataNbEmpruntAbonne[prenom] - $dataNbEmpruntAbonne[emprunts] <br>";
}

echo "<hr>";
$affichagePTD = $pdo->query("SELECT a.prenom, l.titre, e.date_sortie FROM abonne a, emprunt e, livre l WHERE a.id_abonne = e.id_abonne AND e.id_livre = l.id_livre ORDER BY a.prenom");
echo "les abonnés avec les livres qu'ils ont empruntés : <br>";
while ($dataAffichagePTD = $affichagePTD->fetch(PDO::FETCH_ASSOC)){
    echo "$dataAffichagePTD[prenom] - $dataAffichagePTD[titre] - $dataAffichagePTD[date_sortie] <br>";
}
echo "<hr>";

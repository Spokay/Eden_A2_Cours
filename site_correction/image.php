<?php
include("inc/fonction.inc.php");
$pdo = new PDO("mysql:host=localhost; dbname=image", "root", "");

debug($_FILES);
if (!empty($_FILES['photo'])){
    debug($_SERVER['DOCUMENT_ROOT']);
    $photo = $_FILES['photo']['name'];
    $photo_bd = "/A2_Cours/site/photo/$photo";
    $chemin = $_SERVER['DOCUMENT_ROOT']."/A2_Cours/site/photo/$photo";
    copy($_FILES['photo']['tmp_name'], $chemin);
    $resultat = $pdo->exec("INSERT INTO photo(nom, description, url) VALUES('$_POST[nom]', '$_POST[description]', '$photo_bd')");
    if ($resultat != false) {
        echo "photo insérée"; 
    }
}   

$res = $pdo->query("SELECT * FROM photo");

while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
    echo "<img src='$data[url]' alt=''>";
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="nom">
    <textarea name="description" id="" cols="30" rows="10"></textarea>
    <input type="file" name="photo">
    <input type="submit">
</form>
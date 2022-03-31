<?php
$pdo = new PDO('mysql:host=localhost; dbname=repertoire', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if($_POST){
    extract($_POST);
    $pdo->exec("INSERT INTO annuaire(nom, prenom, telephone, profession, ville, code_postal, adresse, date_de_naissance, sexe, description) VALUES('$nom', '$prenom', '$telephone', '$profession', '$ville', '$code_postal', '$adresse', '$date_de_naissance', '$sexe', '$description')");
    header('location: affichage_annuaire.php');
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Title</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" style="width='10%'; display: flex; flex-direction: column;">
    <fieldset style="width: 150px">
        <legend>Informations</legend>
        <label for="nom">Nom *</label>
        <input type="text" id="nom" name="nom" placeholder="nom" required>
        <label for="prenom">Prénom *</label>
        <input type="text" name="prenom" id="prenom" placeholder="prenom" required>
        <label for="telephone">Telephone *</label>
        <input type="tel" name="telephone" id="telephone">
        <label for="profession">Profession</label>
        <input type="text" name="profession" id="profession">
        <label for="ville">Ville</label>
        <input type="text" name="ville" id="ville">
        <label for="code_postal">Code Postal</label>
        <input type="number" id="code_postal" name="code_postal">
        <label for="adresse">Adresse</label>
        <textarea name="adresse" id="adresse" cols="30" rows="10"></textarea>
        <label for="date_de_naissance">Date de naissance</label>
        <input type="date" name="date_de_naissance" id="date_de_naissance">
        <div>
            <label for="m">Masculin</label>
            <input type="radio" name="sexe" value="m" id="m">
            <label for="f">Feminin</label>
            <input type="radio" name="sexe" value="f" id="f">
        </div>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        <input type="submit" value="envoyer">
    </fieldset>
</form>
</body>
</html>

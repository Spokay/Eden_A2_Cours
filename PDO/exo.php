<?php
$pdo = new PDO('mysql:host=localhost; dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if (!empty($_POST)){
    var_dump($_POST);
    /*$pdo->exec("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire) VALUES('$prenom', '$nom', '$sexe', '$service', '$date_embauche', '$salaire')");*/
    $pdo->exec("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire) VALUES('$_POST[prenom]', '$_POST[nom]', '$_POST[sexe]', '$_POST[service]', '$_POST[date_embauche]', '$_POST[salaire]')");
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Title</title>
</head>
<body>

    <form action="" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column;width: 200px">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" placeholder="prenom">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" placeholder="nom">
        <div>
            <label for="m">Masculin</label>
            <input type="radio" name="sexe" value="m" id="m">
            <label for="f">Feminin</label>
            <input type="radio" name="sexe" value="f" id="f">
        </div>
        <label for="service">Services</label>
        <select name="service" id="service">
            <option value="commercial">commercial</option>
            <option value="production">production</option>
            <option value="secretaria">secretariat</option>
            <option value="comptabilite">comptabilite</option>
            <option value="direction">direction</option>
            <option value="informatique">informatique</option>
            <option value="juridique">juridique</option>
            <option value="assistant">assistant</option>
        </select>
        <label for="date-embauche">Date d'embauche</label>
        <input type="date" name="date_embauche" id="date_embauche" placeholder="2021-02-03">
        <label for="salaire">Salaire</label>
        <input type="number" id="salaire" name="salaire" placeholder="2300">
        <input type="submit" value="envoyer">
    </form>

</body>
</html>
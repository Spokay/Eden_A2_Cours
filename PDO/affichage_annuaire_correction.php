<?php

$pdo = new PDO('mysql:host=localhost; dbname=repertoire', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


$resultatAll = $pdo->query("SELECT * FROM annuaire");

echo "<table border='1'>";
echo "<thead>";
for ($i = 0; $i < $resultatAll->columnCount(); $i++){
    $column = $resultatAll->getColumnMeta($i);
    echo "<th>$column[name]</th>";
}
echo "</thead>";
while ($donnees = $resultatAll->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    foreach ($donnees as $key => $valeur){
        echo "<td>$valeur</td>";
    }
    echo "<td><a href='?modifid=". ($donnees['id_annuaire']??'') ."'>modifier</a></td>";
    echo "<td><a href='?action=delete&deleteid=". ($donnees['id_annuaire']??'') ."' id='delete-button' OnClick='return(confirm(\"voulez vous vraiment supprimer ce profil\"))'>supprimer</a></td>";
    echo "</tr>";
}
echo "</table>";

if ($_POST){
    if (isset($_GET['modifid'])){
            extract($_POST);
            $pdo->exec("UPDATE annuaire SET nom = '$nom', prenom = '$prenom', telephone = '$telephone', profession = '$profession', ville = '$ville', code_postal = '$code_postal', adresse = '$adresse', date_de_naissance = '$date_de_naissance', sexe = '$sexe', description = '$description' WHERE id_annuaire = '$_GET[modifid]'");
            header("location:affichage_annuaire_correction.php");
    }
    if(empty($_GET)){
            extract($_POST);
            $pdo->exec("INSERT INTO annuaire(nom, prenom, telephone, profession, ville, code_postal, adresse, date_de_naissance, sexe, description) VALUES('$nom', '$prenom', '$telephone', '$profession', '$ville', '$code_postal', '$adresse', '$date_de_naissance', '$sexe', '$description')");
            header('location: affichage_annuaire_correction.php');
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $pdo->exec("DELETE FROM annuaire WHERE id_annuaire = '$_GET[deleteid]'");
    header('location: affichage_annuaire_correction.php');
}
if (isset($_GET['modifid'])){
    $idData = $pdo->query("SELECT * FROM annuaire WHERE id_annuaire = '$_GET[modifid]'")->fetch(PDO::FETCH_ASSOC);
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
        #modal-background{
            background-color: rgba(0, 0, 0, 0.4);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            display: block;
        }
        .hidden-modal{
            position: relative;
            border-radius: 5px;
            border: 0.5px solid grey;
            background-color: #fff;
            margin: 20% auto;
            box-shadow: 3px 0 10px black;
            width: 25%;
        }
        .confirm-block{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
        .confirm-block > p{
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>

    <form action="" method="post" enctype="multipart/form-data" style="width='10%';">
        <fieldset style="width: 150px;display: flex; flex-direction: column;">
            <legend><?php echo isset($_GET['modifid']) ? 'Modifier le profil' : 'Ajouter un profil' ?></legend>
            <label for="nom">Nom *</label>
            <input type="text" id="nom" name="nom" placeholder="nom" required value="<?php
            echo $idData['nom']??'';
            ?>">
            <label for="prenom">Prénom *</label>
            <input type="text" name="prenom" id="prenom" placeholder="prenom" required value="<?php
            echo $idData['prenom']??'';
            ?>">
            <label for="telephone">Telephone *</label>
            <input type="tel" name="telephone" id="telephone" value="<?php
            echo $idData['telephone']??'';
            ?>">
            <label for="profession">Profession</label>
            <input type="text" name="profession" id="profession" value="<?php
            echo $idData['profession']??'';
            ?>">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" value="<?php
            echo $idData['ville']??'';
            ?>">
            <label for="code_postal">Code Postal</label>
            <input type="number" id="code_postal" name="code_postal" value="<?php
            echo $idData['code_postal']??'';
            ?>">
            <label for="adresse">Adresse</label>
            <textarea name="adresse" id="adresse" cols="30" rows="10"><?php
                echo $idData['adresse']??'';
                ?></textarea>
            <label for="date_de_naissance">Date de naissance</label>
            <input type="date" name="date_de_naissance" id="date_de_naissance" value="<?php
            echo $idData['date_de_naissance']??'';
            ?>">
            <div>
                    <label for="m">Masculin</label>
                    <input type="radio" name="sexe" value="m" id="m" <?php
                    if (isset($idData['sexe']) && $idData['sexe'] === 'm'){
                        echo 'checked';
                    }
                    ?>>
                    <label for="f">Feminin</label>
                    <input type="radio" name="sexe" value="f" id="f" <?php
                    if (isset($idData['sexe']) && $idData['sexe'] === 'f'){
                        echo 'checked';
                    }
                    ?>>
            </div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"><?php
                echo $idData['description']??'';
                ?></textarea>
            <input type="submit" value="envoyer">
        </fieldset>
    </form>
    <a href="affichage_annuaire_correction.php">Page d'accueil</a>
</body>
</html>

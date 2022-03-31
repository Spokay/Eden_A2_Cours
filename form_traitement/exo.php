<?php
include 'inc/function.inc.php';
if ($_POST){
    extract($_POST);
    debug($_POST);
    $completeNameFiltered = trim(filter_var($completeName,FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $error = '';
    if(empty($completeName) || empty($email) || empty($postCode) || empty($phone)){
        $error .= "Tous les champs du formulaire ne sont pas remplis. <br>";
    }
    if(strlen($completeNameFiltered) < 2){
        $error .= "Le nom dois faire au moins 2 caractères. <br>";
    }
    /*if (!in_array('@' , str_split($email))){
        $error .= "L'adresse mail n'est pas valide. <br>";
    }*/
    if(!trim(filter_var($email,FILTER_VALIDATE_EMAIL))){
        $error .= "L'adresse mail n'est pas valide. <br>";
    }
    if (strlen($postCode) !== 5 && !ctype_digit($postCode)){
        $error .= "le code postal est invalide. <br>";
    }
    /*if ((substr($phone, 0, 2) !== '05' && substr($phone, 0, 2) !== '06') || strlen($phone) !== 10){
        $error .= "Le numéro de téléphone n'est pas valide. <br>";
    }*/
    if (!preg_match("/^(06|05)([0-9]{2}){4}$/", $phone)){
        $error .= "Le numéro de téléphone n'est pas valide. <br>";
    }
    echo $error;
    echo "<table border='1'>";
    foreach ($_POST as $key => $val){
        echo "<tr>";
        if ($key == 'languages' || $key == 'domaines') {
            $val = implode(',', $val);
            echo "<td>$key</td>";
            echo "<td>$val</td>";
        }else{
            echo "<td>$key</td>";
            echo "<td>$val</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>My Title</title>
    <style>
        input{
            margin: 10px;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column; width: 300px">
        <label for="completeName">Nom & prénom</label>
        <input type="text" name="completeName" id="completeName" placeholder="Emmanuel Macron">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="rien@gmail.com">
        <label for="postCode">Code postal</label>
        <input type="number" name="postCode" id="postCode" placeholder="92700">
        <label for="phone">Téléphone</label>
        <input type="tel" name="phone" id="phone" placeholder="0611111111">
        <div>
            <input type="radio" id="masculin" name="sexe" value="masculin"
                   checked>
            <label for="masculin">Masculin</label>
        </div>
        <div>
            <input type="radio" id="feminin" name="sexe" value="feminin"
                   checked>
            <label for="feminin">feminin</label>
        </div>

        <label for="pays">Pays</label>
        <select name="pays" id="pays">
            <option>France</option>
            <option>Allemagne</option>
            <option>Espagne</option>
            <option>Italie</option>
        </select>


        <!-- le select est récupéré en array si on met des crochet dans le name -->
        <label for="languages">Languages préférés</label>
        <select name="languages[]" id="languages" multiple>
            <option value="Javascript">Javascript</option>
            <option value="C++">C++</option>
            <option value="PHP">PHP</option>
            <option value="CSS">CSS</option>
            <option value="Ruby">Ruby</option>
            <option value="Python">Python</option>
        </select>

        <div>
            <input type="checkbox" name="domaines[]" id="check1" value="informatique">
            <label for="check1">Informatique</label>
            <input type="checkbox" name="domaines[]" id="check2" value="Gestion">
            <label for="check2">Gestion</label>
            <input type="checkbox" name="domaines[]" id="check3" value="Pedagogie">
            <label for="check3">Pedagogie</label>
        </div>
        <input type="submit" value="envoyer">
    </form>
</body>
</html>
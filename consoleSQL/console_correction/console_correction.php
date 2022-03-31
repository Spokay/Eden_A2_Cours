<?php
$db = $_POST['db'] ?? '';
$pdo = new PDO("mysql:host=localhost; dbname=$db", "root", "");
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Console correction</title>
</head>
<body>
<form action="" method="post">
    <label for="db">BDD</label>
    <select name="db" id="db">
        <?php
        $resultat = $pdo->query("SHOW DATABASES");

        while ($database = $resultat->fetch(PDO::FETCH_ASSOC)){
            foreach ($database as $val){
                if($_POST['db'] == $val){
                    $select = 'selected';
                }else{
                    $select = '';
                }
                echo "<option value='$val' $select>$val</option>";
            }
        }

        ?>
    </select><br>
        <label for="contenu">Requête</label>
        <textarea name="contenu" id="contenu" cols="30" rows="10"><?php if (isset($_POST['contenu'])){
                echo $_POST['contenu'];
            }
            if (isset($_POST['historique'])){
                echo $_POST['historique'];
            }
            ?></textarea><br>
        <input type="submit" value="envoyer" name="valider">
</form>
<?php
if (!empty($_POST['contenu'])){
    $requete = $_POST['contenu'];
    if (preg_match("#select#i", $requete)){
        $resultat = $pdo->query("$requete");
        if ($resultat != false){
            $success = 'true';
        }else{
            $success = 'false';
        }
        echo "La requête est : $_POST[contenu] <br>";
        echo "Bdd : $db <br>";
        echo "les tables concernées sont : ";
        $tables = $pdo->query("SHOW TABLES FROM $db");
        while ($tab = $tables->fetch(PDO::FETCH_ASSOC)){
            foreach ($tab as $val){
                echo "$val ";
            }
        }

        echo "lignes concernées : ". $resultat->rowCount() . "<br>";
        echo "<table border='1'>";
        echo "<thead>";
        for ($i =0; $i < $resultat->columnCount(); $i++){

            $colonne = $resultat->getColumnMeta($i);
            echo "<th>$colonne[name]</th>";
        }
        echo "</thead>";
        echo "<tbody>";
        while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            foreach ($donnees as $val){
                echo "<td>$val</td>";
            }
            echo "</tr>";
        }
        echo "<tbody>";
        echo "</table>";
    }elseif (preg_match("#insert|delete|update#i", $requete)){
        $resultat = $pdo->exec("$requete");
        if ($resultat != false){
            $success = 'true';
        }else{
            $success = 'false';
        }
    }
    if ($success == 'true'){
        echo "<h3 style='background-color: green'>requete réussie</h3>";
    }else{
        echo "<h3 style='background-color: red'>requete ratée</h3>";
    }
    $form = fopen('historique.txt', 'a');
    date_default_timezone_set('Europe/Paris');
    fwrite($form, $_POST['contenu'] .'|'.$db.'|'. date('Y-m-d H:i:s', time()) . "\n");
    fclose($form);
}
if (isset($_GET['action']) && $_GET['action'] == 'suppression'){
    if (file_exists('historique.txt')){
        unlink('historique.txt');
    }
    header("location: console_correction.php");
}
?>

<form action="" method="post">
    <fieldset>
        <legend>Historique</legend>
            <?php
            if (file_exists('historique.txt')){
                $form = fopen('historique.txt', 'r');
                while ($ligne = fgets($form)) {
                    $tab = explode("|", $ligne);
                    echo "<input type='hidden' name='db' value='$tab[1]'>";
                    echo "<input type='submit' name='historique' value='$tab[0]'>";
                }
                fclose($form);
            }
            ?>
            <a href="?action=suppression">Effacer l'historique des requêtes</a>
            <input type="submit" value="Delete queries history" name="deleteHistory" class="btn btn-delete">
    </fieldset>
</form>

</body>
</html>

<?php

$pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$primaryKey = '';
if (!empty($_POST)){
    extract($_POST);
    $error = '';
    if (isset($_GET['action']) && $_GET['action'] == 'modifier'){
        /*modification*/
        if ($_GET['affichage'] == 'emprunt'){
            if (empty($date_rendu)){
                $pdo->exec("UPDATE emprunt SET id_livre = '$id_livre', id_abonne = '$id_abonne', date_sortie = '$date_sortie' WHERE id_emprunt = '$_GET[id]'");
            }else{
                $pdo->exec("UPDATE emprunt SET id_livre = '$id_livre', id_abonne = '$id_abonne', date_sortie = '$date_sortie', date_rendu = '$date_rendu' WHERE id_emprunt = '$_GET[id]'");
            }
        }elseif($_GET['affichage'] == 'livre'){

            if (empty($auteur) || empty($titre)){
                $error .= "<p>Veuillez renseigner tout les champs</p>";
            }else{
                $pdo->exec("UPDATE livre SET auteur = '$auteur', titre = '$titre' WHERE id_livre = '$_GET[id]'");
            }
        }elseif($_GET['affichage'] == 'abonne'){

            if (empty($prenom)){
                $error .= "<p>Veuillez renseigner tout les champs</p>";
            }else{
                $pdo->exec("UPDATE abonne SET prenom = '$prenom' WHERE id_abonne = '$_GET[id]'");
            }
        }

    }else{
        /*insertion*/
        if (isset($_GET['affichage']) && $_GET['affichage'] == 'emprunt'){
            if (empty($date_rendu)){
                $pdo->exec("INSERT INTO emprunt(id_livre, id_abonne, date_sortie) VALUES('$id_livre', '$id_abonne', '$date_sortie')");

            }else{
                $pdo->exec("INSERT INTO emprunt(id_livre, id_abonne, date_sortie, date_rendu) VALUES('$id_livre', '$id_abonne', '$date_sortie', '$date_rendu')");
            }
        }elseif(isset($_GET['affichage']) && $_GET['affichage'] == 'livre'){
            if (empty($auteur) || empty($titre)){
                $error .= "<p>Veuillez renseigner tout les champs</p>";
            }else{
                $pdo->exec("INSERT INTO livre(auteur, titre) VALUES('$auteur', '$titre')");
            }
        }elseif(isset($_GET['affichage']) && $_GET['affichage'] == 'abonne'){
            if (empty($prenom)){
                $error .= "<p>Veuillez renseigner tout les champs</p>";
            }else{
                $pdo->exec("INSERT INTO abonne(prenom) VALUES('$prenom')");
            }
        }
    }
    echo $error;
}
if (isset($_GET['action']) && $_GET['action'] == 'modifier'){
    /*modification*/
    $data = $pdo->query("SELECT * FROM $_GET[affichage] WHERE $_GET[pk] = $_GET[id]")->fetch(PDO::FETCH_ASSOC);
    echo "<div><a href=".'bibliotheque.php?affichage='.$_GET['affichage']." class='btn btn-danger btn-block edit-leave'>Quitter le mode édition</a></div>";
}elseif (isset($_GET['action']) && $_GET['action'] == 'supprimer'){
    $pdo->exec("DELETE FROM $_GET[affichage] WHERE $_GET[pk] = '$_GET[id]'");
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6a771afa96.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Bibliotheque</title>
</head>
<body>

<nav class="navbar-dark bg-dark">
    <ul class="nav justify-content-center p-4">
        <li class="nav-item m-2">
            <a href="?affichage=emprunt" class="nav-link">Emprunt</a>
        </li>
        <li class="nav-item m-2">
            <a href="?affichage=livre" class="nav-link">Livre</a>
        </li>
        <li class="nav-item m-2">
            <a href="?affichage=abonne" class="nav-link">Abonne</a>
        </li>
    </ul>
</nav>
<div>
    <a href="bibliotheque.php" class="btn btn-block bg-light">Accueil</a>
</div>

<?php

if (isset($_GET['affichage'])){
    $resultatAll = $pdo->query("SELECT * FROM $_GET[affichage]");
    echo "<table class='table'>";
    echo "<thead class='thead-dark'>";
    $primaryKey = $resultatAll->getColumnMeta(0)['name'];
    for ($i = 0; $i < $resultatAll->columnCount(); $i++){
        $column = $resultatAll->getColumnMeta($i);
        echo "<th>$column[name]</th>";
    }
    echo "<th>Modifier</th>";
    echo "<th>Supprimer</th>";
    echo "</thead>";
    while ($donnees = $resultatAll->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($donnees as $key => $valeur){
            echo "<td>$valeur</td>";
        }
        /* modifier et supprimer */
        echo "<td><a href='?affichage=".$_GET['affichage']."&action=modifier&id=". $donnees[$primaryKey] ."&pk=$primaryKey'><i class='fas fa-pencil-alt'></i></a></td>";
        echo "<td><a href='?affichage=".$_GET['affichage']."&action=supprimer&id=". $donnees[$primaryKey] ."&pk=$primaryKey' id='delete-button' OnClick='return(confirm(\"voulez vous vraiment supprimer ce profil\"))'><i class='fas fa-trash-alt'></i></a></td>";
        echo "</tr>";
    }
    echo "</table>";

}

if (isset($_GET['affichage']) && $_GET['affichage'] == 'emprunt'){
    $abonneTable = $pdo->query("SELECT id_abonne, prenom FROM abonne");
    $livreTable = $pdo->query("SELECT id_livre, auteur, titre FROM livre");
    ?>
    <div class="container-fluid">
    <form method="post" action="" class="form py-3">
            <!--select avec tout les abonnés disponibles -->
            <div class="form-group">
                <label for="id_abonne">Abonne</label>
                <select name="id_abonne" id="id_abonne" class="form-control">
                    <?php
                    while ($aboData = $abonneTable->fetch(PDO::FETCH_ASSOC)){
                        if ((isset($_GET['action']) && $_GET['action'] == 'modifier') && $data['id_abonne'] == $aboData['id_abonne']){
                            echo "<option value=".$aboData['id_abonne']." selected>".$aboData['id_abonne'] . " - " .$aboData['prenom']."</option>";
                        }else{
                            echo "<option value=".$aboData['id_abonne'].">".$aboData['id_abonne'] . " - " .$aboData['prenom']."</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <!-- select avec tous les livres disponibles -->
            <div class="form-group">
                <label for="livre">Livre</label>
                <select name="id_livre" id="livre" class="form-control">
                    <?php
                    while ($livreData = $livreTable->fetch(PDO::FETCH_ASSOC)){
                        if ((isset($_GET['action']) && $_GET['action'] == 'modifier') && $data['id_livre'] == $livreData['id_livre']){
                            echo "<option value=".$livreData['id_livre']." selected>".$livreData['id_livre'] . " - " .$livreData['auteur']. " | " . $livreData['titre'] ."</option>";
                        }else{
                            echo "<option value=".$livreData['id_livre'].">".$livreData['id_livre'] . " - " .$livreData['auteur']. " | " . $livreData['titre'] ."</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="date_sortie">Date de sortie</label>
                <input type="date" name="date_sortie" placeholder="date_sortie" value="<?php
                if (isset($_GET['action']) && $_GET['action'] == 'modifier' && !empty($data['date_sortie']) && $data['date_sortie'] !== '0000-00-00'){
                    echo $data['date_sortie'];
                }else{
                    $now = new DateTime();
                    echo $now->format('Y-m-d');
                }

                ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="date_rendu">Date de rendu</label>
                <input type="date" name="date_rendu" placeholder="date_rendu" value="<?php
                if (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($data['date_rendu'])){
                    echo $data['date_rendu'];
                }
                ?>" class="form-control">
            </div>

            <input type="submit" class="btn btn-primary btn-lg btn-block">
</form>
</div>
<?php
}elseif (isset($_GET['affichage']) && $_GET['affichage'] == 'livre'){
?>
    <div class="container-fluid">
        <form method="post" action="" class="form py-3">
            <fieldset>
                <legend>Livre</legend>
                <div class="form-group">
                    <label for="auteur">Auteur</label>
                    <input type="text" name="auteur" id="auteur" value="<?php echo $data['auteur']??''; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" id="auteur" value="<?php echo $data['titre']??''; ?>" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary btn-lg btn-block">
            </fieldset>
        </form>
    </div>

<?php
}elseif (isset($_GET['affichage']) && $_GET['affichage'] == 'abonne'){
?>
    <div class="container-fluid">
        <form method="post" action="" class="form py-3">
            <fieldset>
                <legend>Abonne</legend>
                <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" id="prenom" value="<?php echo $data['prenom']??''; ?>" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary btn-block btn-lg">
            </fieldset>
        </form>
    </div>
<?php
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>



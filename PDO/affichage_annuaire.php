<?php
$pdo = new PDO('mysql:host=localhost; dbname=repertoire', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

function displayTable(){
    global $pdo;
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
        echo "<td><a href='?deleteid=". ($donnees['id_annuaire']??'') ."' id='delete-button'>supprimer</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}

displayTable();


$resultatNbHomme = $pdo->query("SELECT COUNT(*) AS nb_homme FROM annuaire WHERE sexe = 'm'");
$resH = $resultatNbHomme->fetch(PDO::FETCH_ASSOC);
echo "le nombre d'homme est " . $resH['nb_homme'];
$resultatNbFemme = $pdo->query("SELECT COUNT(*) AS nb_femme FROM annuaire WHERE sexe = 'f'");
$resF = $resultatNbFemme->fetch(PDO::FETCH_ASSOC);
echo "<br> le nombre de femmes est ". $resF['nb_femme'];
if (isset($_GET['modifid']) || isset($_GET['deleteid'])){

    $id = $pdo->query("SELECT id_annuaire FROM annuaire WHERE id_annuaire = '$_GET[modifid]'")->fetch(PDO::FETCH_ASSOC);

    if (isset($_GET['modifid']) && $id['id_annuaire'] === $_GET['modifid']){
        $id_annuaire = $_GET['modifid'];
        $modifData = $pdo->query("SELECT * FROM annuaire WHERE id_annuaire = '$id_annuaire'");
        $modifTab = $modifData->fetch(PDO::FETCH_ASSOC);
        if ($_POST){
            extract($_POST);
            $pdo->exec("UPDATE annuaire SET nom = '$nom', prenom = '$prenom', telephone = '$telephone', profession = '$profession', ville = '$ville', code_postal = '$code_postal', adresse = '$adresse', date_de_naissance = '$date_de_naissance', sexe = '$sexe', description = '$description' WHERE id_annuaire = '$id_annuaire'");
            header("location:affichage_annuaire_correction.php");
        }

        ?>
        <form action="" method="post" enctype="multipart/form-data" style="width='10%';">
            <fieldset style="width: 150px;display: flex; flex-direction: column;">
                <legend>Modifier le profil</legend>
                <label for="nom">Nom *</label>
                <input type="text" id="nom" name="nom" placeholder="nom" required value="<?php
                echo $modifTab['nom'];
                ?>">
                <label for="prenom">Prénom *</label>
                <input type="text" name="prenom" id="prenom" placeholder="prenom" required value="<?php
                echo $modifTab['prenom'];
                ?>">
                <label for="telephone">Telephone *</label>
                <input type="tel" name="telephone" id="telephone" value="<?php
                echo $modifTab['telephone'];
                ?>">
                <label for="profession">Profession</label>
                <input type="text" name="profession" id="profession" value="<?php
                echo $modifTab['profession'];
                ?>">
                <label for="ville">Ville</label>
                <input type="text" name="ville" id="ville" value="<?php
                echo $modifTab['ville'];
                ?>">
                <label for="code_postal">Code Postal</label>
                <input type="number" id="code_postal" name="code_postal" value="<?php
                echo $modifTab['code_postal'];
                ?>">
                <label for="adresse">Adresse</label>
                <textarea name="adresse" id="adresse" cols="30" rows="10"><?php
                    echo $modifTab['adresse'];
                    ?></textarea>
                <label for="date_de_naissance">Date de naissance</label>
                <input type="date" name="date_de_naissance" id="date_de_naissance" value="<?php
                echo $modifTab['date_de_naissance'];
                ?>">
                <div>
                    <?php
                    if ($modifTab['sexe'] === 'm'){
                        ?>
                        <label for="m">Masculin</label>
                        <input type="radio" name="sexe" value="m" id="m" checked>
                        <label for="f">Feminin</label>
                        <input type="radio" name="sexe" value="f" id="f">
                        <?php
                    }else{
                        ?>
                        <label for="m">Masculin</label>
                        <input type="radio" name="sexe" value="m" id="m">
                        <label for="f">Feminin</label>
                        <input type="radio" name="sexe" value="f" id="f" checked>
                        <?php
                    }
                    ?>
                </div>
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"><?php echo $modifTab['description'];
                    ?></textarea>
                <input type="submit" value="envoyer">
            </fieldset>
        </form>
        <?php
    }
    else if (isset($_GET['deleteid']) && $id['id_annuaire'] === $_GET['modifid']){
        ?>
        <!doctype html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>My Title</title>
            <style>
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
        <div id="modal-background">
            <div class="hidden-modal">
                <div class="confirm-block">
                    <p>Voulez vous vraiment supprimer ce profil ?</p>
                    <div>
                        <form action="" method="post">
                            <input type="submit" value="Oui" name="oui">
                        </form>

                    </div>
                    <div>
                        <form action="" method="post">
                            <input type="submit" value="Non" name="non">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </body>
        </html>
        <?php
        if (isset($_POST) && isset($_POST['oui'])){
            $pdo->exec("DELETE FROM annuaire WHERE id_annuaire = '$_GET[deleteid]'");
            header('location: affichage_annuaire_correction.php');
        }
    }
    else{
        header('location: affichage_annuaire_correction.php');
    }
}else{
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
    <?php
}
?>






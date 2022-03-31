<?php

include("../inc/init.inc.php");
include("../inc/haut.inc.php");

if (!isConnectedAsAdmin()) {
    header("Location:".RACINE_SITE."connexion.php");
}
if (!empty($_POST)){
    foreach($_POST as $key => $value){
        $_POST[$key] = htmlspecialchars(addslashes($value));
    }
    extract($_POST);
    $valid = true;
    if (isset($_GET['action']) && $_GET['action'] == 'modifier' && !empty($_POST['modifier'])) {
            if (!empty($_FILES['photo']['name'])) {
                $photo = $_FILES['photo']['name'];
                $photoRes = $pdo->query("SELECT * FROM produit WHERE photo = '/A2_Cours/site/photo/$photo'");
                if ($photoRes->rowCount() > 0){
                    $valid = false;
                    $res = false;
                    $errorFileExists = "<p>Le fichier que vous avez séléctioné est déja le fichier du produit</p>"; 
                }else{
                    $photo = $reference.'-'.$_FILES['photo']['name'];
                    $photo_bdd_path =  "/A2_Cours/site/photo/$photo";
                    $photo_path = $_SERVER['DOCUMENT_ROOT'] . "/A2_Cours/site/photo/$photo";
                    copy($_FILES['photo']['tmp_name'], $photo_path);
                }
                if ($valid == true) {
                    $res = $pdo->exec("UPDATE produit SET reference = '$reference', id_categorie = '$categorie', titre = '$titre', description = '$description', couleur = '$couleur', id_taille = '$taille', photo = '$photo_bdd_path', prix = '$prix', stock = '$stock' WHERE id_produit = '$_GET[modifid]'");   
                }
            }else{
                $res = $pdo->exec("UPDATE produit SET reference = '$reference', id_categorie = '$categorie', titre = '$titre', description = '$description', couleur = '$couleur', id_taille = '$taille', prix = '$prix', stock = '$stock' WHERE id_produit = '$_GET[modifid]'");       
            }
            if ($res !== false) {
                $success = "<p>modification effectuée</p>";
            }
    }elseif(isset($_GET['action']) && $_GET['action'] == 'ajouter' && !empty($_POST['ajouter'])){
            if (!empty($_FILES['photo'])) {
                $photo = $reference.'-'.$_FILES['photo']['name'];
                $photoRes = $pdo->query("SELECT * FROM produit WHERE photo = '/A2_Cours/site/photo/$photo'");
                if ($photoRes->rowCount() > 0){
                    $valid = false;
                    $errorFileExists = "<p>Le fichier que vous avez séléctioné existe déjà</p>";
                }else{
                    $photo_bdd_path =  "/A2_Cours/site/photo/$photo";
                    $photo_path = $_SERVER['DOCUMENT_ROOT'] . "/A2_Cours/site/photo/$photo";
                    copy($_FILES['photo']['tmp_name'], $photo_path);
                }
            }else{
                $valid = false;
            }
            if ($valid == true) {
                $resultat = $pdo->exec("INSERT INTO produit(reference, id_categorie, titre, description, couleur, id_taille, photo, prix, stock) VALUES('$reference', '$categorie', '$titre', '$description', '$couleur', '$taille', '$photo_bdd_path', '$prix', '$stock')");
                $success = "<p>Produit ajouté dans la boutique</p>";
            }else{
                $error = "<p>Le produit n'a pas pu être ajouté à la boutique";
            }
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'supprimer'){
    $pdo->exec("DELETE FROM produit WHERE id_produit = '$_GET[deleteid]'");
    $success = "<p>Données supprimées avec succès</p>";
    header("Location:?action=gerer");
}

?>
<div class="conteneur">
    <a href="?action=ajouter" class="btn btn-link">Ajouter des produits <i class="fas fa-plus-square"></i></a>
    <a href="?action=categorie" class="btn btn-link">Ajouter une catégorie <i class="fas fa-plus-square"></i></a>
    <a href="?action=taille" class="btn btn-link">Ajouter une taille <i class="fas fa-plus-square"></i></a>
    <a href="?action=gerer" class="btn btn-link">Gérer les produits <i class="fas fa-tasks"></i></a>

    <?=$success??'';?>
    <?=$error??'';?>
</div>
<?php
if(!empty($_GET['action']) && $_GET['action'] == 'ajouter' || !empty($_GET['action']) && $_GET['action'] == 'modifier'){

    if($_GET['action'] == 'modifier'){
        $dataModif = $pdo->query("SELECT * FROM produit WHERE id_produit = '$_GET[modifid]'")->fetch(PDO::FETCH_ASSOC);
    }
?>

<form action="" method="post" enctype="multipart/form-data" class="form form-produit">
    <input type="text" name="reference" id="reference" placeholder="reference" value="<?=$dataModif['reference']??randomRef(); ?>">
    <select name="categorie" id="categorie">
        <?php
        $categorieRes = $pdo->query("SELECT * FROM categorie");
        while ($dataCategorie = $categorieRes->fetch(PDO::FETCH_ASSOC)){
            
            echo "<option value='$dataCategorie[id_categorie]'>$dataCategorie[nom]</option>";
        }
        ?>
    </select>
    <input type="text" name="titre" id="titre" placeholder="titre" value="<?=$dataModif['titre']??''; ?>">
    <textarea name="description" id="description" placeholder="description"><?=$dataModif['description']??''; ?></textarea>
    <input type="text" name="couleur" id="couleur" placeholder="couleur" value="<?=$dataModif['couleur']??''; ?>">
    <select name="taille" id="taille">
        <?php
        $tailleRes = $pdo->query("SELECT * FROM taille");
        debug($tailleRes);
        while ($dataTaille = $tailleRes->fetch(PDO::FETCH_ASSOC)){
            
            echo "<option value='$dataTaille[id_taille]'>$dataTaille[nom]</option>";
        }
        ?>
    </select>
    <div>
        <input type="file" name="photo" value="<?=$dataModif['photo']??''; ?>">
        <img src="<?=$dataModif['photo']??''; ?>" alt="emplacement de photo à selectioner" class="mini-img">
        <?=$errorFileExists??'';?>
    </div>
    <input type="number" name="prix" id="prix" placeholder="prix" value="<?=$dataModif['prix']??''; ?>">
    <input type="number" name="stock" id="stock" placeholder="Stock" value="<?=$dataModif['stock']??''; ?>">
    <input name="<?= $_GET['action']??''; ?>" type="submit" value="Envoyer" class="btn btn-submit">
</form>
<?php }elseif(isset($_GET['action']) && $_GET['action'] == 'gerer'){
    $dataProduits = $pdo->query("SELECT * FROM produit");
    echo "<table class='table'>";
    echo "<thead class='thead-dark'>";
    for ($i = 0; $i < $dataProduits->columnCount(); $i++){
        $column = $dataProduits->getColumnMeta($i);
        if ($column['name'] == 'id_categorie') {
            echo "<th>categorie</th>";
        }elseif($column['name'] == 'id_taille'){
            echo "<th>taille</th>";
        }else{
            echo "<th>$column[name]</th>";
        }
    }
    echo "</thead>";
    while ($data = $dataProduits->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($data as $key => $valeur){
            if ($key == 'photo') {
                echo "<td><img class='mini-img' src='$valeur'></td>";
            }elseif($key == 'id_categorie'){
                $cat = $pdo->query("SELECT nom FROM categorie WHERE id_categorie = '$valeur'")->fetch(PDO::FETCH_ASSOC)['nom'];
                echo "<td>$cat</td>";
            }elseif($key == 'id_taille'){
                $taille = $pdo->query("SELECT nom FROM taille WHERE id_taille = '$valeur'")->fetch(PDO::FETCH_ASSOC)['nom'];
                echo "<td>$taille</td>";
            }else{
                echo "<td>$valeur</td>";
            }

        }
        echo "<td><a href='?action=modifier&modifid=". ($data['id_produit']??'') ."'><i class='fas fa-pencil-alt'></i></a></td>";
        echo "<td><a href='?action=supprimer&deleteid=". ($data['id_produit']??'') ."' id='delete-button' OnClick='return(confirm(\"voulez vous vraiment supprimer ce produit\"))'><i class='fas fa-trash-alt'></i></a></td>";
        echo "</tr>";
    }
    echo "</table>";
}elseif (isset($_GET['action']) && $_GET['action'] == 'categorie'){
    if(!empty($_POST['categorie'])){
        $nom = htmlspecialchars(addslashes($_POST['nom']));
        if(!empty($nom)) {
            $resultat = $pdo->exec("INSERT INTO categorie(nom) VALUES('$nom')");
            if ($resultat !== false) {
                echo "categorie ajoutée";
            }
        }
    }
    ?>

    <form action="" method="post" class="form">
        <input type="text" name="nom">
        <input type="submit" name="categorie" value="Envoyer" class="btn btn-submit">
    </form>

    <?php
}elseif (isset($_GET['action']) && $_GET['action'] == 'taille'){
    if(!empty($_POST['taille'])){
        $nom = htmlspecialchars(addslashes($_POST['nom']));
        if(!empty($nom)) {
            $resultat = $pdo->exec("INSERT INTO taille(nom) VALUES('$_POST[nom]')");
            if($resultat !== false){
                echo "taille ajoutée";
            }
        }

    }
    ?>
    <form action="" method="post" class="form">
        <input type="text" name="nom">
        <input type="submit" name="taille" value="Envoyer" class="btn btn-submit">
    </form>

    <?php
}
?>
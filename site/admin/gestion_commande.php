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
    if (isset($_GET['action']) && $_GET['action'] == 'modifier') {
        if ($valid == true) {
            $res = $pdo->exec("UPDATE commande SET id_membre = '$id_membre', montant = '$montant', date_enregistrement = '$date_enregistrement', etat = '$etat' WHERE id_commande = '$_GET[modifid]'");
            if ($res !== false) {
                $success = "<p>modification effectuée</p>";
            }
        }

    }elseif(isset($_GET['action']) && $_GET['action'] == 'ajouter'){
        if ($valid == true) {
            $resultat = $pdo->exec("INSERT INTO commande(id_membre, montant, date_enregistrement, etat) VALUES('$id_membre', '$montant', '$date_enregistrement', '$etat')");
            if ($resultat !== false) {
                $success = "<p>commande ajoutée dans la boutique</p>";
            }
        }
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'supprimer'){
    $pdo->exec("DELETE FROM commande WHERE id_commande = '$_GET[deleteid]'");
    $success = "<p>Données supprimées avec succès</p>";
    header("Location:?action=gerer");
}

?>
<div class="conteneur">
    <a href="?action=ajouter" class="btn btn-link">Ajouter une commande <i class="fas fa-plus-square"></i></a>
    <a href="?action=gerer" class="btn btn-link">Gérer les commandes <i class="fas fa-tasks"></i></a>

    <?=$success??'';?>
    <?=$error??'';?>
</div>
<?php
if(!empty($_GET['action']) && $_GET['action'] == 'ajouter' || !empty($_GET['action']) && $_GET['action'] == 'modifier'){

    if($_GET['action'] == 'modifier'){
        $dataModif = $pdo->query("SELECT * FROM commande WHERE id_commande = '$_GET[modifid]'")->fetch(PDO::FETCH_ASSOC);
    }
?>

<form action="" method="post" enctype="multipart/form-data" class="form form-commande">
    <label for="id_membre">id du membre</label>
    <input type="number" name="id_membre" id="id_membre" placeholder="12345" value="<?=$dataModif['id_membre']??''; ?>">
    <label for="montant">Montant de la commande</label>
    <input type="number" name="montant" id="montant" placeholder="345" value="<?=$dataModif['montant']??''; ?>">
    <label for="date_enregistrement">Date de l'enregistrement de la commande</label>
    <input type="date" name="date_enregistrement" id="date_enregistrement" value="<?php // add the date when modified ?>">
    <select name="etat" id="etat">
        <?php
        $etat = $pdo->query("SELECT * FROM etat");
        debug($etat);
        while ($dataEtat = $etat->fetch(PDO::FETCH_ASSOC)){
            if ($dataModif['etat'] == $dataEtat['id_etat']){
                echo "<option selected value='$dataEtat[id_etat]'>$dataEtat[nom]</option>";
            }else{
                echo "<option value='$dataEtat[id_etat]'>$dataEtat[nom]</option>";
            }
        }
        ?>
    </select>
    <input type="submit" value="Envoyer" class="btn btn-submit">
</form>
<?php }elseif(isset($_GET['action']) && $_GET['action'] == 'gerer'){
    $dataCommandes = $pdo->query("SELECT * FROM commande");
    echo "<table class='table'>";
    echo "<thead class='thead-dark'>";
    for ($i = 0; $i < $dataCommandes->columnCount(); $i++){
        $column = $dataCommandes->getColumnMeta($i);
            echo "<th>$column[name]</th>";
    }
    echo "</thead>";
    while ($data = $dataCommandes->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($data as $key => $valeur){
                echo "<td>$valeur</td>";
        }
        echo "<td><a href='?action=modifier&modifid=". ($data['id_commande']??'') ."'><i class='fas fa-pencil-alt'></i></a></td>";
        echo "<td><a href='?action=supprimer&deleteid=". ($data['id_commande']??'') ."' id='delete-button' OnClick='return(confirm(\"voulez vous vraiment supprimer ce commande\"))'><i class='fas fa-trash-alt'></i></a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

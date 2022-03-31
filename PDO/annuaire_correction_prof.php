<?php
$pdo = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
if (!empty($_POST)) {
    var_dump($_POST);

    if (isset($_GET['action']) && $_GET['action'] == 'modifier'){
        $pdo->exec("UPDATE annuaire SET nom = '$_POST[nom]', prenom = '$_POST[prenom]',telephone = '$_POST[telephone]',profession = '$_POST[profession]',ville = '$_POST[ville]',code_postal = '$_POST[cp]',adresse = '$_POST[adresse]',date_de_naissance = '$_POST[date]', sexe = '$_POST[sexe]',description = '$_POST[description]' WHERE id_annuaire = '$_GET[id]'");
    }else{
        extract($_POST);
        $pdo->exec("INSERT INTO annuaire(nom, prenom, telephone,profession,ville,code_postal,adresse,date_de_naissance,sexe,description) VALUES('$nom','$prenom','$telephone','$profession','$ville','$cp','$adresse','$date','$sexe','$description') ");
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'supprimer'){
    $pdo->exec("DELETE FROM annuaire WHERE id_annuaire = '$_GET[id]'");
    echo 'élement supprimé';
}
if (isset($_GET['id'])){
    $resultat = $pdo->query("SELECT * FROM annuaire WHERE id_annuaire = '$_GET[id]'");
    $donnees = $resultat->fetch(PDO::FETCH_ASSOC);
}
$resultatAll = $pdo->query("SELECT * FROM annuaire");
$masculin = 0;
$feminin = 0;
echo "<table style='border-collapse: collapse; border: 1px solid #000'>";
echo "<thead>";
for ($i = 0; $i < $resultatAll->columnCount(); $i++){
    $column = $resultatAll->getColumnMeta($i);
    echo "<th style='padding: 10px; border: 1px solid #000'>$column[name]</th>";
}
echo "</thead>";
while ($donnees = $resultatAll->fetch(PDO::FETCH_ASSOC)) {
    if ($donnees['sexe'] == 'm'){
        $masculin += 1;
    }elseif ($donnees['sexe'] == 'f'){
        $feminin += 1;
    }
    echo "<tr>";
    foreach ($donnees as $key => $valeur){
        echo "<td style='border: 1px solid #000; padding: 10px'>$valeur</td>";
    }
    /* modifier et supprimer */
    echo "<td style='border: 1px solid #000; padding: 10px'><a href='?action=modifier&id=". $donnees['id_annuaire'] ."'>modifier</a></td>";
    echo "<td style='border: 1px solid #000; padding: 10px'><a href='?action=supprimer&id=". $donnees['id_annuaire'] ."' id='delete-button' OnClick='return(confirm(\"voulez vous vraiment supprimer ce profil\"))'>supprimer</a></td>";
    /* /modifier et supprimer */
    echo "</tr>";
}
echo "</table>";
echo "il y a $masculin homme <br>";
echo "il y a $feminin femme <br>";

if (isset($donnees) || $_SERVER['SCRIPT_NAME'] == '/A2_Cours/PDO/annuaire_correction_prof.php'){
?>
<div style="width:300px">
    <form method="post" action="">
        <fieldset>
            <legend>Inscription </legend>
            <label for=" nom">Nom</label><br>
            <input type="text" name="nom" placeholder="nom" id="nom" value="<?php echo $donnees['nom']??'' ?>"><br><br>
            <label for="prenom">Prenom</label><br>
            <input type="text" name="prenom" placeholder="prenom" id="prenom" value="<?php echo $donnees['prenom']??'' ?>"><br><br>
            <label for="telephone">Téléphone</label><br>
            <input type="tel" name="telephone" placeholder="telephone" value="<?php echo $donnees['telephone']??'' ?>"><br><br>
            <label for="profession">profession</label><br>
            <input type="text" name="profession" placeholder="profession" value="<?php echo $donnees['profession']??'' ?>"><br><br>
            <label for="ville">ville</label><br>
            <input type="text" name="ville" placeholder="ville" value="<?php echo $donnees['ville']??'' ?>"><br><br>
            <label for="cp">code postal</label><br>
            <input type="number" name="cp" placeholder="code postal" value="<?php echo $donnees['code_postal']??'' ?>"><br><br>
            <label for="adresse">adresse</label><br>
            <textarea name="adresse" id="adresse" cols="30" rows="10"><?php echo $donnees['adresse']??'' ?></textarea><br><br>
            <label for="Date de naissance">Date de naissance <i>(Format: AAAA-MM-JJ)</i></label><br>
            <input type="date" name="date" placeholder="ex: 2015-07-30" value="<?php echo $donnees['date_de_naissance']??'' ?>"><br><br>

            <label for="sexe">sexe</label><br>
            <input type="radio" name="sexe" placeholder="sexe" id="sexe" value='m' <?php if (isset($donnees['sexe']) && $donnees['sexe'] == 'm') {
                echo 'checked';
            } ?>>
            <input type="radio" name="sexe" placeholder="sexe" id="sexe" value='f' <?php if (isset($donnees['sexe']) && $donnees['sexe'] == 'f') {
                echo 'checked';
            } ?>><br><br>
            <label for="description">description</label><br>
            <textarea name="description" id="description" cols="30" rows="10"><?php echo $donnees['profession']??'' ?></textarea><br><br>

            <input type="submit" />
    </form>
</div>
<?php
}

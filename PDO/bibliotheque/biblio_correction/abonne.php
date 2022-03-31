<?php

if (!empty($_POST)){
    extract($_POST);

    if (isset($_GET['action']) && $_GET['action'] == 'modification'){
        $pdo->exec("UPDATE abonne SET prenom = '$prenom' WHERE id_abonne = '$_GET[id_abonne]'");
        $modif = "données modifiées";
    }else{
        $pdo->query("INSERT INTO abonne(prenom) VALUES('$prenom')");
        $success = "<h4 class='alert alert-success'>Données enregistrées</h4>";
    }
}

if (isset($_GET['page']) && $_GET['page'] == 'abonne'){
    $resultat = $pdo->query("SELECT * FROM abonne");
    $contenu .= "<table class='table'>";
    $contenu .= "<th>id_abonne</th><th>prenom</th><th>modification</th><th>suppression</th>";
    while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)){
        $contenu .= "<tr>";
        foreach ($donnees as $val){
            $contenu .= "<td>$val</td>";
        }
        $contenu .= '<td><a href="?page=abonne&action=modification&id_abonne=' . $donnees['id_abonne'] . '"><span class="glyphicon glyphicon-pencil"></span></a></td>';
        $contenu .= '<td><a href="?page=abonne&action=suppression&id_abonne=' . $donnees['id_abonne'] . '"><span class="glyphicon glyphicon-remove"></span></a></td>';
        $contenu .= "</tr>";
    }
    $contenu .= "</table>";
    if (isset($_GET['action']) && $_GET['action'] == 'suppression'){
        $pdo->exec("DELETE FROM abonne WHERE id_abonne = '$_GET[id_abonne]'");
        $suppression = "<h4 class='alert alert-danger'>Données supprimées avec succès</h4>";
        // header("location:?page=abonne&confirm=true");
    }
}
if (isset($_GET['id_abonne'])){
    $resultat = $pdo->query("SELECT * FROM abonne WHERE id_abonne = '$_GET[id_abonne]'");
    $donnees = $resultat->fetch(PDO::FETCH_ASSOC);
    $value1 = $donnees['prenom'] ?? '';
}else{
    $value1 = '';
}


$contenu .= '<form action="" method="post">
    <input type="text" name="prenom" value="'.$value1.'" placeholder="prenom"><br><br>
    <input type="submit" value="envoyer">
</form>';



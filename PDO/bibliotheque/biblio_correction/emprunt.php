<?php

if (!empty($_POST)){
    extract($_POST);

    if (isset($_GET['action']) && $_GET['action'] == 'modification'){
        $pdo->exec("UPDATE emprunt SET id_livre = '$id_livre', id_abonne = '$id_abonne', date_sortie = '$date_sortie', date_rendu = '$date_rendu' WHERE id_emprunt = '$_GET[id_emprunt]'");
        $modif = "données modifiées";
    }else{
        $pdo->query("INSERT INTO emprunt(id_livre, id_abonne, date_sortie, date_rendu) VALUES('$id_livre', '$id_abonne', '$date_sortie', '$date_rendu')");
        $success = "<h4 class='alert alert-success'>Données enregistrées</h4>";
    }
}

if (isset($_GET['page']) && $_GET['page'] == 'emprunt'){
    $resultat = $pdo->query("SELECT * FROM emprunt");
    $contenu .= "<table class='table'>";
    $contenu .= "<th>id_emprunt</th><th>id_livre</th><th>id_abonne</th><th>date_sortie</th><th>date_rendu</th><th>modification</th><th>suppression</th>";
    while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)){
        $contenu .= "<tr>";
        foreach ($donnees as $val){
            $contenu .= "<td>$val</td>";
        }
        $contenu .= '<td><a href="?page=emprunt&action=modification&id_emprunt=' . $donnees['id_emprunt'] . '"><span class="glyphicon glyphicon-pencil"></span></a></td>';
        $contenu .= '<td><a href="?page=emprunt&action=suppression&id_emprunt=' . $donnees['id_emprunt'] . '"><span class="glyphicon glyphicon-remove"></span></a></td>';
        $contenu .= "</tr>";
    }
    $contenu .= "</table>";
    if (isset($_GET['action']) && $_GET['action'] == 'suppression'){
        $pdo->exec("DELETE FROM emprunt WHERE id_emprunt = '$_GET[id_emprunt]'");
        $suppression = "<h4 class='alert alert-danger'>Données supprimées avec succès</h4>";
        // header("location:?page=emprunt&confirm=true");
    }
}
if (isset($_GET['id_emprunt'])){
    $resultat = $pdo->query("SELECT * FROM emprunt WHERE id_emprunt = '$_GET[id_emprunt]'");
    $donnees = $resultat->fetch(PDO::FETCH_ASSOC);
    $value1 = $donnees['date_sortie'] ?? '';
    $value2 = $donnees['date_rendu'] ?? '';
    $value3 = $donnees['id_livre'] ?? '';
    $value4 = $donnees['id_abonne'] ?? '';
}else{
    $value1 = '';
    $value2 = '';
}
$livre = $pdo->query("SELECT * FROM livre");
$abonne = $pdo->query("SELECT * FROM abonne");

$contenu .= '<form action="" method="post">';
    $contenu .= '<select name="id_livre" id="id_livre">';
        while($donnees = $livre->fetch(PDO::FETCH_ASSOC)){
            if (isset($_GET['action']) && $_GET['action'] == 'modification' && $donnees['id_livre'] == $value3){
                $contenu .= '<option value="'.$donnees['id_livre'].'" selected>'. $donnees['id_livre'] ." - ".$donnees['auteur'] . " | " . $donnees['titre'] .'</option>';
            }else{
                $contenu .= '<option value="'.$donnees['id_livre'].'">'. $donnees['id_livre'] ." - ".$donnees['auteur'] . " | " . $donnees['titre'] .'</option>';
            }
        }
    $contenu .= '</select><br><br>';
    $contenu .= '<select name="id_abonne" id="id_abonne">';
        while($donnees = $abonne->fetch(PDO::FETCH_ASSOC)){
            if (isset($_GET['action']) && $_GET['action'] == 'modification' && $donnees['id_abonne'] == $value4){
                $contenu .= '<option value="'.$donnees['id_abonne'].'" selected>'. $donnees['id_abonne'] ." - ".$donnees['prenom'] .'</option>';
            }else{
                $contenu .= '<option value="$donnees[id_abonne]">'. $donnees['id_abonne'] ." - ".$donnees['prenom'] .'</option>';
            }
        }
    $contenu .= '</select><br><br>';
        $contenu .= '<input type="date" name="date_sortie" value="'.$value1.'"><br>';
        $contenu .= '<input type="date" name="date_rendu" value="'.$value2.'" <br>
    <input type="submit" value="envoyer">
</form>';



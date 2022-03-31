<?php

if (!empty($_POST)){
    extract($_POST);

    if (isset($_GET['action']) && $_GET['action'] == 'modification'){
        $pdo->exec("UPDATE livre SET auteur = '$auteur', titre = '$titre' WHERE id_livre = '$_GET[id_livre]'");
        $modif = "données modifiées";
    }else{
        $pdo->query("INSERT INTO livre(auteur, titre) VALUES('$auteur', '$titre')");
        $success = "<h4 class='alert alert-success'>Données enregistrées</h4>";
    }
}

if (isset($_GET['page']) && $_GET['page'] == 'livre'){
    $resultat = $pdo->query("SELECT * FROM livre");
    $contenu .= "<table class='table'>";
        $contenu .= "<th>id_livre</th><th>auteur</th><th>titre</th><th>modification</th><th>suppression</th>";
        while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)){
            $contenu .= "<tr>";
            foreach ($donnees as $val){
                $contenu .= "<td>$val</td>";
            }
            $contenu .= '<td><a href="?page=livre&action=modification&id_livre=' . $donnees['id_livre'] . '"><span class="glyphicon glyphicon-pencil"></span></a></td>';
            $contenu .= '<td><a href="?page=livre&action=suppression&id_livre=' . $donnees['id_livre'] . '"><span class="glyphicon glyphicon-remove"></span></a></td>';
            $contenu .= "</tr>";
        }
    $contenu .= "</table>";
    if (isset($_GET['action']) && $_GET['action'] == 'suppression'){
        $pdo->exec("DELETE FROM livre WHERE id_livre = '$_GET[id_livre]'");
        $suppression = "<h4 class='alert alert-danger'>Données supprimées avec succès</h4>";
    }
}
if (isset($_GET['id_livre'])){
    $resultat = $pdo->query("SELECT * FROM livre WHERE id_livre = '$_GET[id_livre]'");
    $donnees = $resultat->fetch(PDO::FETCH_ASSOC);
    $value1 = $donnees['auteur'] ?? '';
    $value2 = $donnees['titre'] ?? '';
}else{
     $value1 = '';
     $value2 = '';
}


$contenu .= '<form action="" method="post">
    <input type="text" name="auteur" value="'.$value1.'" placeholder="auteur"><br><br>
    <input type="text" name="titre" value="'.$value2.'" placeholder="titre"><br><br>
    <input type="submit" value="envoyer">
</form>';



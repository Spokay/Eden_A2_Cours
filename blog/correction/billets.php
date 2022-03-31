
<?php


$pdo = new PDO("mysql:host=localhost;dbname=blog", "root", "");
if(!empty($_POST)){
    $titre = addslashes($_POST['titre']);
    $contenu = addslashes($_POST['contenu']);
    $pdo->exec("INSERT INTO billets(titre, contenu, date_creation) VALUES ('$titre', '$contenu', NOW())");
}
$resultat = $pdo->query("SELECT * FROM billets ORDER BY id_billet DESC LIMIT 0, 5");

while ($billets = $resultat->fetch(PDO::FETCH_ASSOC)){
    echo "<table>";
        echo "<tr>";
            echo "<td>$billets[titre]</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>$billets[contenu]</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td><a href='commentaires.php?idbillet=$billets[id_billet]'>Commentaires</a> <p>$billets[date_creation]</p></td>";
        echo "</tr>";
    echo "</table>";
}

?>
<form action="" method="post">
    <input type="text" name="titre" placeholder="titre"><br><br>
    <textarea name="contenu" id="contenu" cols="30" rows="10" placeholder="contenu"></textarea><br><br>
    <input type="submit" value="envoyer">
</form>
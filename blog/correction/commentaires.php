<?php
$pdo = new PDO("mysql:host=localhost; dbname=blog", "root", "");

$res = $pdo->query("SELECT b.id_billet, b.titre, COUNT(c.id_commentaire) AS coms FROM billets b, commentaires c WHERE b.id_billet = c.id_billet GROUP BY id_billet");
if(!empty($_POST)){
    $auteur = addslashes($_POST['auteur']);
    $commentaire = addslashes($_POST['commentaire']);
    $pdo->exec("INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES ('$_GET[idbillet]' ,'$auteur', '$commentaire', NOW())");
}

if(isset($_GET['idbillet'])){
    $resultat = $pdo->query("SELECT * FROM commentaires WHERE id_billet = '$_GET[idbillet]'");
    while ($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)){
        echo "<table>";
        echo "<tr>";
            echo "<td>$commentaire[auteur]</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>$commentaire[commentaire]</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>$commentaire[date_commentaire]</td>";
        echo "</tr>";
    echo "</table>";
    }
}else{ 
    $resultat = $pdo->query("SELECT * FROM billets");
    echo "<ul>";
    while ($billets = $resultat->fetch(PDO::FETCH_ASSOC)){
        $count = $pdo->query("SELECT *, COUNT(*) AS coms FROM commentaires WHERE id_billet = $billets[id_billet]")->fetch(PDO::FETCH_ASSOC);
        echo "<li><a href='?idbillet=$billets[id_billet]'>$billets[titre]</a> ";
            echo $count['coms']??'0';
        echo " commentaires </li>";
        
    }
    echo "</ul>";
}
?>

<form action="" method="post">
    <input type="text" name="auteur" placeholder="auteur"><br><br>
    <textarea name="commentaire" id="commentaire" cols="30" rows="10" placeholder="commentaire"></textarea><br><br>
    <input type="submit" value="envoyer">
</form>
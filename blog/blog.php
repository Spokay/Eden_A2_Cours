<?php

$pdo = new PDO("mysql:host=localhost; dbname=blog", "root", "");

if(!empty($_POST)){
    extract($_POST);
    $title = htmlspecialchars($title);
    $content = filter_var($content,FILTER_SANITIZE_SPECIAL_CHARS);
    $date = date('Y-m-d H:i:s',time()); 
    $pdo->exec("INSERT INTO billets(titre, contenu, date_creation) VALUES ('$title','$content','$date')");
}
$billets = $pdo->query("SELECT * FROM billets ORDER BY date_creation DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css">
    <title>Blog</title>
</head>
<body>
    <a href="commentaire.php">Voir tous les articles</a>
    <form action="" method="post" class="article-create">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" placeholder="titre">
        <label for="content">Contenu</label>
        <textarea name="content" id="content" placeholder="Contenu"></textarea> 
        <input type="submit" value="Envoyer">
    </form>

    <div class="articles-container">
    <?php
    if(isset($billets)){
        while($dataBills = $billets->fetch(PDO::FETCH_ASSOC)){
            echo "<article class='billet'><h3 class='article-title'>$dataBills[titre]</h3><p>$dataBills[contenu]</p><div><a href='commentaire.php?affichage=article&idbillet=$dataBills[id_billet]'>Commentaires</a> créee le : $dataBills[date_creation]</div></article>";
        }
    }
    ?>
    </div>
</body>
</html>


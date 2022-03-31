<?php

$pdo = new PDO("mysql:host=localhost; dbname=blog", "root", "");
$data = $pdo->query("SELECT * FROM billets ORDER BY date_creation DESC");

if(!empty($_POST)){
    extract($_POST);
    $date = date('Y-m-d H:i:s',time()); 
    $pdo->exec("INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES('$_GET[idbillet]','$author', '$comment', '$date')");
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css">
    <title>Commentaires</title>
</head>
<body>


<?php
if(isset($_GET['affichage'])){
    if(isset($_GET['idbillet'])){
    $billet = $pdo->query("SELECT * FROM billets WHERE id_billet = '$_GET[idbillet]'")->fetch(PDO::FETCH_ASSOC);
    $commentaires = $pdo->query("SELECT * FROM commentaires WHERE id_billet = '$_GET[idbillet]' ORDER BY date_commentaire DESC");

    
        if(isset($_GET['affichage']) && $_GET['affichage'] == 'article'){
            if(isset($billet)){
            echo "<article class='billet'><h3 class='article-title'>$billet[titre]</h3><p>$billet[contenu]</p><div>créee le : $billet[date_creation]</div></article>";
            ?>
            <form action="" method="post" class="comments-container">
                <label for="author">Auteur</label><br>
                <input type="text" name="author" id="author" placeholder="auteur"><br>
                <label for="comment">Nouveau commentaire</label>
                <div>
                    <textarea name="comment" placeholder="Nouveau commentaire" id="comment"></textarea>
                    <input type="submit" value="Envoyer">
                </div>
            </form>
            <div class="comments-container">
            <?php 
                if(isset($commentaires)){
                    while($comment = $commentaires->fetch(PDO::FETCH_ASSOC)){
                        echo "<div class='comment'><h4 class='auteur'>$comment[auteur]</h4><p>$comment[commentaire]</p><p>commenté le : $comment[date_commentaire]</p></div>";
                    }
                }
            ?>
            </div>
            <?php
            }
        }elseif(isset($_GET['affichage']) && $_GET['affichage'] == 'list'){
            echo "<article class='billet'><h3 class='article-title'>$billet[titre]</h3><p>$billet[contenu]</p><div>créee le : $billet[date_creation]</div></article>";
            ?>

            <div class="comment-list">
                <div class="commentaires">
                    <form action="" method="post" class="comments-form">
                        <label for="author">Auteur</label><br>
                        <input type="text" name="author" id="author" placeholder="auteur"><br>
                        <label for="comment">Nouveau commentaire</label>
                        <div>
                            <textarea name="comment" placeholder="Nouveau commentaire" id="comment"></textarea>
                        </div>
                        <input type="submit" value="Envoyer">
                    </form>
                    <div class="comments-container">
                    <?php 
                        if(isset($commentaires)){
                            while($comment = $commentaires->fetch(PDO::FETCH_ASSOC)){
                                echo "<div class='comment'><h4 class='auteur'>$comment[auteur]</h4><p>$comment[commentaire]</p><p>commenté le : $comment[date_commentaire]</p></div>";
                            }
                        }
                    ?>
                </div>
            </div>
            <?php
        }
    
    }
}   
if(empty($_GET) || $_GET['affichage'] == 'list'){
    ?>
        <?php
    echo "<table class='table'>";
        echo "<thead class='thead-dark'>";
        $primaryKey = $data->getColumnMeta(0)['name'];
        for ($i = 0; $i < $data->columnCount(); $i++){
            $column = $data->getColumnMeta($i);
            echo "<th>$column[name]</th>";
        }
        echo "<th>lien</th>";
        echo "</thead>";
        while ($currentBillet = $data->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            foreach ($currentBillet as $key => $valeur){
                echo "<td>$valeur</td>";
            }
            echo "<td><a href='?affichage=list&idbillet=$currentBillet[id_billet]'>voir l'article</a></td>";
            echo "</tr>";
        }
        echo "</table>";
}

?>
</div>


<a href="blog.php">retourner à l'accueil</a>
</body>
</html>


<?php
ob_start();

?>

<section class="dashboard">
    
    <div class="blockAllList" id="masonry">
        <?php
            foreach ($articles as $article) {
                ?>
                    <div class="blockCard">
                        <div class="card">
                            <div class="top">
                                <p><?php echo escape($article->getTitre()); ?>
                                <?php echo escape($article->getDate()); ?> par <?php echo escape($article->getLogin()); ?></p>
                                <?php
                                if (isset($_SESSION["user"]) && ($_SESSION["user"]["role"] == 1 || $_SESSION["user"]["role"] == 2 || ($_SESSION["user"]["role"] == 3 && $_SESSION["user"]["id"]==$article->getId_user()))) {
                                ?>
                                    <p><a href="/dashboard/<?php echo escape($article->getId_article()); ?>/delete/">supprimer</a></p>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="top">
                                <?php
                                if (!empty($article->getPhoto())) { ?>
                                    <p><img src="image/<?php echo escape($article->getPhoto()); ?>"></p>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="top">
                                <p><?php echo escape($article->getTexte()); ?>
                            </div>
                            <a href='/article/<?php echo escape($article->getId_article()); ?>'>En savoir plus sur l'article</a>
                        </div>

                    </div>

                <?php
            }
        ?>
        
    </div>
</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';

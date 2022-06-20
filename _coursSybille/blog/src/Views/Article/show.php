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
                            <p><?php
                                echo escape($article->getTitre()); ?>
                                <?php echo escape($article->getDate()); ?> par <?php echo escape($article->getLogin()); ?></p>
                            <?php
                            if (isset($_SESSION["user"]) && ($_SESSION["user"]["role"] == 1 || $_SESSION["user"]["role"] == 2 || $_SESSION["user"]["role"] == 3)) {
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
                        <div class="comment-section">
                            <p>Poster un Commentaires</p>
                            <form action="/article/<?php echo escape($article->getId_article()); ?>/comment/create" method="post">
                                <textarea name="Texte" id="" cols="30" rows="5"></textarea>
                                <input type="submit" value="Poster">
                            </form>
                            <div class="comments-container">
                                <?php foreach ($comments as $comment){?>
                                        <div class="comment">
                                            <p><?php echo escape($comment->getIdUser()); ?></p>
                                            <p><?php echo escape($comment->getTexte()); ?></p>
                                            <p><?php echo escape($comment->getDate()); ?> <span><a href="#" class="answer-comment">répondre</a></span></p>
                                            <span class="hidden comment-id"><?php echo escape($comment->getIdComment()); ?></span>
                                            <span class="hidden article-id"><?php echo escape($article->getId_article()); ?></span>
                                            <div class="comment-answer-container">

                                            </div>
                                            <div class="other-comments">

                                            </div>
                                        </div>
                                <?php } ?>
                            </div>
                        </div>
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
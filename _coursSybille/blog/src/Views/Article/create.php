<?php
ob_start();
?>

<section class="create">
    <h1><i class="fas fa-list-alt"></i> Création d'un article :</h1>
    <div>
        <div class="list">
            <div class="top">
                <p>Ajouter un article</p>                
            </div>
            <div class="separateur"></div>
            <div class="bottom">
                <form action="/dashboard/nouveau" method="post" enctype='multipart/form-data'>
                    <input type="text" name="name" value="<?php echo old("name");?>" placeholder="Titre de l'article">
                    <button type="submit" name="button"><i class="fas fa-plus"></i></button>
                    <p>
                    Photo: <input type="file" name="photo" >
                    </p>
                    <textarea name="texte" rows="8" cols="40" placeholder="Titre de l'article"><?php echo old("texte");?></textarea>
                    
                </form>
                <span class="error"><?php echo error("name");?><?php echo error("texte");?></span>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';

<?php 

    include("../inc/init.inc.php");
    include("../inc/haut.inc.php");
?>
    <a href="?action=categorie">Ajout de categorie</a>
    <a href="?action=taille">Ajout de taille</a>
    <a href="?action=ajouter">Ajout de produit</a>
    <a href="?action=gerer">Gerer les produits</a>
<?php
    $reference = rand(100, 999).'-'. rand(100, 999);
    if (!empty($_POST['produit'])){
        if (!empty($_FILES['photo']['name'])) {
            $photo = $_FILES['photo']['name'];
            $chemin = $_SERVER['DOCUMENT_ROOT']. "A2_Cours/site/photo/$photo";
            $photo_bd = "A2_Cours/site/photo/$photo";
            if (!file_exists($chemin)) {
                copy($_FILES['photo']['tmp_name'], $chemin);
                foreach($_POST as $key => $val){
                    $_POST[$key] = addslashes(htmlspecialchars($val));
                }
            }else{
                echo "image deja existante";
            }
            
        }
        
        extract($_POST);
        $res = $pdo->exec("INSERT INTO produit(reference, id_categorie, titre, description, couleur, id_taille, public, photo, prix, stock) VALUES('$reference', '$categorie', '$titre', '$description', '$couleur', '$taille', '$public', '$photo_bd', '$prix', '$stock')");   
        if($res !== false){
            echo "produit ajouté";
        }
    }

   
    
    if (!empty($_FILES['photo']['name'])){
            
    }else{

    }

    
   

    if (isset($_GET['action']) && $_GET['action'] == 'categorie'){
        if(!empty($_POST['categorie'])){
            $resultat = $pdo->exec("INSERT INTO categorie(nom) VALUES('$_POST[nom]')");
            if($resultat !== false){
                echo "categorie ajoutée ajouté";
            }
        }
        ?>
        
        <form action="" method="post">
            <input type="text" name="nom">
            <input type="submit" name="categorie" value="Envoyer">
        </form>

        <?php 
    }
    if (isset($_GET['action']) && $_GET['action'] == 'taille'){
        if(!empty($_POST['taille'])){
            $resultat = $pdo->exec("INSERT INTO taille(nom) VALUES('$_POST[nom]')");
            if($resultat !== false){
                echo "taille ajoutée ajouté";
            }
        }
        ?>
        <form action="" method="post">
            <input type="text" name="nom">
            <input type="submit" name="taille" value="Envoyer">
        </form>

        <?php 
    }
?>

<h1> Formulaire Produits </h1>
<form method="post" enctype="multipart/form-data" action="">

    <input type="hidden" id="id_produit" name="id_produit" value="" />

    <label for="reference">reference</label><br>
    <input type="text" id="reference" name="reference" placeholder="la référence de produit" value="<?=$reference??''; ?>"> <br><br>

    <label for="categorie">categorie</label><br>
    <select name="categorie">
        <?php
        $resultat1 = $pdo->query("SELECT DISTINCT nom, id_categorie FROM categorie");
            while($cat = $resultat1->fetch(PDO::FETCH_ASSOC)){
                echo "<option value='$cat[id_categorie]'>$cat[nom] </option>";
            }
            
        ?>
    </select><br><br>

    <label for="titre">titre</label><br>
    <input type="text" id="titre" name="titre" placeholder="le titre du produit" /> <br><br>

    <label for=" description">description</label><br>
    <textarea name="description" id="description" placeholder="la description du produit"></textarea><br><br>

    <label for=" couleur">couleur</label><br>
    <input type="text" id="couleur" name="couleur" placeholder="la couleur du produit" /> <br><br>

    <label for="taille">Taille</label><br>
    <select name="taille">
        <?php 
         $resultat2 = $pdo->query("SELECT DISTINCT nom, id_taille FROM taille");
        while($taille = $resultat2->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='$taille[id_taille]'>$taille[nom] </option>";
        }
        ?>
    </select><br><br>

    <label for="public">public</label><br>
    <input type="radio" name="public" value="f">Femme<br><br>

    <input type="radio" name="public" value="m">Homme<br><br>

    <input type="radio" name="public" value="mixte">Mixte<br><br>

    <label for="photo">photo</label><br>
    <input type="file" id="photo" name="photo"><br><br>

    <label for="prix">prix</label><br>
    <input type="text" id="prix" name="prix" placeholder="le prix du produit"><br><br>

    <label for="stock">stock</label><br>
    <input type="text" id="stock" name="stock" placeholder="le stock du produit"><br><br>

    <input type='submit' value='Ajouter un produit' name="produit">
</form>
<?php
require 'init.inc.php';

if (isset($_POST['creer']) && isset($_POST['nom'])){
    $perso = new Personnage(array('nom'=>$_POST['nom']));
    if (!$perso->nomValide()){
        $message = "le nom choisis est invalide";
        unset($perso);
    }elseif($manager->exist($perso->nom())){
        $message = "le nom du personnage est déja pris";
        unset($perso);
    }else{
        $manager->add($perso);
    }
}elseif(isset($_POST['utiliser']) && isset($_POST['nom'])){
    if ($manager->exist($_POST['nom'])) {
        $manager->get($_POST['nom']);
    }else{
        $message = "ce personnage n'existe pas";
    }
}

?>
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
    <title>TP : Mini jeu de combat</title>
    <meta http-equiv="Content-type" content="text/html; charset=iso- 8859-1" />
</head>
<body>
    <p>Nombre de personnages créés : <?= $manager->count(); ?></p>
    <?= $message??'';?>
    <?php if (isset($perso)){ ?>

    <fieldset>
        <legend>Mes informations</legend> <p>
            Nom : <?php echo htmlspecialchars($perso->nom()); ?><br>
            Degats : <?php echo htmlspecialchars($perso->degats()); ?><br>
        </p>
    </fieldset>
    <fieldset>
        <legend>Qui frapper ?</legend>
    </fieldset>
    <?php
        $persos = $manager->getList($perso->nom());
        if (empty($persos)){
            echo "personnes a frapper";
        }else{
            foreach ($persos as $unPerso){
                echo "<a href=''>".htmlspecialchars($unPerso->nom())."</a>";
            }
        }
    } ?>
    <form method="post" action="">
        <label for="nom">nom :</label>
        <input type="text" name="nom" maxlength="50" id="nom">
        <input type="submit" name="creer" value="Créer ce personnage">
        <input type="submit" name="utiliser" value="Utiliser ce personnage">
        <p><a href="?deconnexion=1">Déconnexion</a></p>


    </form>
</body>
</html>
<?php
session_start();
require('init.inc.php');
if (isset($_SESSION['partie'])){
    $partie = unserialize($_SESSION['partie']);
}
if (!isset($_SESSION['players'])){
    $_SESSION['players'] = array();
    $_SESSION['nb_players'] = 0;
}
if (!empty($_POST)){
    extract($_POST);
    if (isset($create)){
        $perso  = new Personnage(array('nom'=>$nom));
        $PersoManager->insert('personnages',$perso);
    }
    if (isset($_POST['start']) && isset($_SESSION['nb_players']) && ($_SESSION['nb_players'] > 1)){
        $players = array();
        for ($playerI = 0; $playerI < $_SESSION['nb_players']; $playerI++) {
            $player = $_SESSION['players'][$playerI];
            $request = $PersoManager->selectPerso($player)->fetch(PDO::FETCH_ASSOC);
            $players[] = new Personnage($request);
        }
        $partie = new Partie($_SESSION['nb_players'], $players);
        $_SESSION['partie'] = serialize($partie);
    }
    if (isset($_POST['action'])){
        $query = $PersoManager->selectPerso($id)->fetch(PDO::FETCH_ASSOC);
        $pers = new Personnage($query);
        $query2 = $PersoManager->selectPerso($cible)->fetch(PDO::FETCH_ASSOC);
        $target = new Personnage($query2);
        $partie->action($action, $pers, $target);
        $partie->updateBoard($PersoManager);
    }
}
if (isset($_GET['add']) && !in_array($_GET['add'], $_SESSION['players'])){
    $_SESSION['players'][]= $_GET['add'];
    $_SESSION['nb_players'] += 1;
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <fieldset>
        <legend>Réglage de partie</legend>
        <form action="" method="post">
            <input type="text" name="nom">
            <input type="submit" value="ajouter un personnage" name="create">
        </form>
        <form action="" method="post">
            <input type="submit" value="start" name="start">
        </form>
    </fieldset>




    <fieldset>
        <legend>Joueurs dans la partie</legend>
        <div class="players">
            <?php
            for ($playerI = 0; $playerI < $_SESSION['nb_players']; $playerI++){
                $player = $_SESSION['players'][$playerI];
                $nomPerso = $PersoManager->selectPerso($player)->fetch(PDO::FETCH_ASSOC);
                echo "<p>$nomPerso[nom]</p>";
            }
            ?>
        </div>
    </fieldset>


    <div class="board">
        <?php
        if ($partie != null){
            if ($partie->started == false){
                echo $partie->start();
            }else{
                echo $_SESSION["board"];
            }
        }
        ?>
    </div>

    <fieldset>
        <legend>Personnages disponibles</legend>
        <div class="personnages-list">
            <ul>
                <?php
                if (isset($PersoManager)) {
                    $persos = $PersoManager->personnagesList();
                    while ($personnage = $persos->fetch(PDO::FETCH_ASSOC)){
                        echo "<li>$personnage[nom] <a href='?add=$personnage[id]'>+</a></li>";
                    }
                }
                ?>
            </ul>
        </div>
    </fieldset>

</body>
</html>




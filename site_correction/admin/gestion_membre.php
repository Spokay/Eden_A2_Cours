<?php 
include("../inc/init.inc.php");
include("../inc/haut.inc.php");

if (!isConnectedAsAdmin()) {
    header("Location:".RACINE_SITE."connexion.php");
}



if(!empty($_POST)){
    foreach($_POST as $key => $val){
        // filter the POST values
        $_POST[$key] = trim(htmlspecialchars(addslashes($val)));
    }
    extract($_POST);
    $valid = true;

    if (isset($_GET['action']) && $_GET['action'] == 'modifier'){

    }else{
        if(empty($pseudo) || empty($mdp) || empty($nom) || empty($prenom) || empty($email) || empty($civilite) || empty($ville) || empty($code_postal) || empty($adresse)){
            $valid = false;
            $errorEmptyField = "<p>Tous les champs ne sont pas remplis</p>";
        }
        if(!preg_match("#^([a-zA-Z0-9._-]){2,20}$#", $pseudo)){
            $valid = false;
            $errorPseudo= "<p>Ce pseudo n'est pas valide</p>";
        }
        if(!preg_match("#^[a-z0-9\.\-_]+@[a-z0-9\.\-_]{2,}\.[a-z]{2,4}$#", $email)){
            $valid = false;
            $errorEmail= "<p>Cet email n'est pas valide</p>";
        }
    
        $resPseudo = $pdo->query("SELECT pseudo FROM membre WHERE pseudo = '$pseudo'");
        $resEmail = $pdo->query("SELECT email FROM membre WHERE email = '$email'");
    
        if($resPseudo->rowCount() > 0 || $resEmail->rowCount() > 0){
            if($resPseudo->rowCount() > 0){
                $errorUsedPseudo = "<p>Ce pseudo est déjà utilisé</p>";
            }
            if($resEmail->rowCount() > 0){
                $errorUsedEmail = "<p>Cet email est déjà utilisé</p>";
            }
            $valid = false;
        }
    
        if($valid === true){
            // if all conditions are valid then insert into the database
            $mdp = md5($mdp);
            $status = 0;
            switch ($_GET['type']){
                case 'membre':
                    $status = 0;
                    break;
                case 'admin':
                    $status = 1;
                case 'direction':
                    $status = 2;
                    break;
                default:
                    
                    break;
            }
            $pdo->exec("INSERT INTO membre (id_membre, pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, status) VALUES(id_membre, '$pseudo', '$mdp', '$nom', '$prenom', '$email', '$civilite', '$ville', '$code_postal', '$adresse', status = '$status')");
            header("Location:connexion.php");
        }
    }
    }
    

if (isset($_GET['action']) && $_GET['action'] == 'supprimer'){
    $pdo->exec("DELETE FROM membre WHERE id_membre = '$_GET[deleteid]'");
    $success = "<p>membre supprimé avec succès</p>";
    header("Location:?action=gerer");
}

?>
<div class="conteneur">
    <a href="?action=ajouter&type=membre" class="btn btn-link">Ajouter des membres</a>
    <a href="?action=ajouter&type=admin" class="btn btn-link">Ajouter des administrateurs</a>
    <a href="?action=ajouter&type=direction" class="btn btn-link">Ajouter des membres de la direction</a>
    <a href="?action=gerer" class="btn btn-link">Gérer les membres</a>
    <?=$success??'';?>
</div>  
<?php
if(!empty($_GET['action']) && $_GET['action'] == 'ajouter' || !empty($_GET['action']) && $_GET['action'] == 'modifier'){

    if($_GET['action'] == 'modifier'){
        $dataModif = $pdo->query("SELECT * FROM membre WHERE id_membre = '$_GET[modifid]'")->fetch(PDO::FETCH_ASSOC);
        ?>

        <form action="" method="post" enctype="multipart/form-data" class="form form-inscription">
            <?=$errorEmptyField??''?>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" value="<?=$dataModif['pseudo']??''; ?>"><?=$errorPseudo??''?><?=$errorUsedPseudo??''?>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?=$dataModif['nom']??''; ?>">
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" id="prenom" value="<?=$dataModif['prenom']??''; ?>">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?=$dataModif['email']??''; ?>"><?=$errorEmail??''?><?=$errorUsedEmail??''?>
            <div>
                <?php
                    if ($dataModif['civilite'] == 'm') {
                        ?>
                        <label for="homme">Homme</label>    
                        <input type="radio" name="civilite" id="homme" value="m" checked>
                        <label for="femme">Femme</label>
                        <input type="radio" name="civilite" id="femme" value="f">
                        <?php
                    }elseif($dataModif['civilite'] == 'f'){
                        ?>
                        <label for="homme">Homme</label>    
                        <input type="radio" name="civilite" id="homme" value="m">
                        <label for="femme">Femme</label>
                        <input type="radio" name="civilite" id="femme" value="f" checked>
                        <?php
                    }
                ?>
                
            </div>
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" value="<?=$dataModif['ville']??''; ?>">
            <label for="code_postal">Code postal</label>
            <input type="number" name="code_postal" id="code_postal" maxlength="5" value="<?=$dataModif['code_postal']??''; ?>">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" value="<?=$dataModif['adresse']??''; ?>">
            <select name="status" id="status">      
                <option value="0">membre</option>
                <option value="1">administrateur</option>
                <option value="2">direction</option>
            </select>
            <input type="submit" value="Envoyer">
        </form>
<?php }elseif($_GET['action'] == 'ajouter'){ ?>
        <form action="" method="post" class="form form-inscription conteneur">
            <?=$errorEmptyField??''?>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo"><?=$errorPseudo??''?><?=$errorUsedPseudo??''?>
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" id="prenom">
            <label for="email">Email</label>
            <input type="email" name="email" id="email"><?=$errorEmail??''?><?=$errorUsedEmail??''?>
            <div>
                <label for="homme">Homme</label>    
                <input type="radio" name="civilite" id="homme" value="m">
                <label for="femme">Femme</label>
                <input type="radio" name="civilite" id="femme" value="f">
            </div>
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville">
            <label for="code_postal">Code postal</label>
            <input type="number" name="code_postal" id="code_postal" maxlength="5">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse">
            <input type="submit" value="S'inscrire">
        </form>

    <?php }?>


<?php }elseif(isset($_GET['action']) && $_GET['action'] == 'gerer'){
    $dataMembre = $pdo->query("SELECT * FROM membre");
    echo "<table class='table'>";
    echo "<thead class='thead-dark'>";
    for ($i = 0; $i < $dataMembre->columnCount(); $i++){
        $column = $dataMembre->getColumnMeta($i);
        if ($column['name'] == 'mdp'){
            continue;
        }else{
            echo "<th>$column[name]</th>";
        }
        
    }
    echo "</thead>";
    while ($data = $dataMembre->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($data as $key => $valeur){
            if ($key == 'mdp'){
                continue;
            }elseif ($key == 'status'){
                if ($valeur == 2) {
                    echo "<td>direction</td>";
                }
                elseif ($valeur == 1) {
                    echo "<td>administrateur</td>";
                }elseif($valeur == 0){
                    echo "<td>membre</td>";
                }
                
            }else{
                echo "<td>$valeur</td>";
            }

        }
        echo "<td><a href='?action=modifier&modifid=". ($data['id_membre']??'') ."'><i class='fas fa-pencil-alt'></i></a></td>";
        echo "<td><a href='?action=supprimer&deleteid=". ($data['id_membre']??'') ."' id='delete-button' OnClick='return(confirm(\"voulez vous vraiment supprimer ce profil\"))'><i class='fas fa-trash-alt'></i></a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
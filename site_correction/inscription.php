<?php 

include("inc/init.inc.php");
include("inc/haut.inc.php");
$error_msg = "";

if(isset($_SESSION['status']) && $_SESSION['status'] >= 0){
    header('location:profil.php');
}

if(!empty($_POST)){
    foreach($_POST as $key => $val){
        // filter the POST values
        $_POST[$key] = trim(htmlspecialchars(addslashes($val)));
    }
    extract($_POST);
    $valid = true;
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
        $pdo->exec("INSERT INTO membre (id_membre, pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse) VALUES(id_membre, '$pseudo', '$mdp', '$nom', '$prenom', '$email', '$civilite', '$ville', '$code_postal', '$adresse')");
        header("Location:connexion.php");
    }
}
    
?>


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

<?php

include("inc/bas.inc.php");
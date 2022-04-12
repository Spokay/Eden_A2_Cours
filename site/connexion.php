<?php

include("inc/init.inc.php");
include("inc/haut.inc.php");
if(isConnected()){
    header('location:profil.php');
}
if (isset($_COOKIE['identifiant'])){
    $donnees = $pdo->query("SELECT pseudo, mdp FROM membre WHERE pseudo = '$_COOKIE[identifiant]' OR email = '$_COOKIE[identifiant]'")->fetchAll(PDO::FETCH_ASSOC);
    $savedPseudo = $donnees[0]['pseudo']??'';
    $savedEmail = $donnees[0]['email']??'';
}
if(!empty($_POST)){
    extract($_POST);
    $error_msg = "";
    $resId = $pdo->query("SELECT * FROM membre WHERE pseudo = '$identifiant' OR email = '$identifiant'");
    $passw = md5($mdp);
    $resPwd = $pdo->query("SELECT * FROM membre WHERE mdp = '$passw'");
    if($resId->rowCount() > 0){
        if ($resPwd->rowCount() > 0) {
            $resData = $resId->fetch(PDO::FETCH_ASSOC);
            if (!empty($remember)) {
                setcookie('identifiant', $identifiant, time() + 3600*24*365);
            }else{
                setcookie('identifiant', '', time());
            }
            foreach($resData as $key => $val){
                $_SESSION['membre'][$key] = $val; 
            }
            $_SESSION['membre']['mdp'] = '';
            $_SESSION['status'] = $_SESSION['membre']['status'];
            
            header("Location:profil.php");
        }
    }else{
        $error_msg .= "<p class='error'>L'identifiant ou le mot de passe est incorrect</p>";
    }
}
echo $error_msg??'';
?>


<form action="" method="post" class="form form-connexion conteneur">
    <label for="identifiant">Identifiant</label>
    <input type="text" name="identifiant" id="identifiant" value="<?php 
    echo $savedPseudo??'';
    echo $savedEmail??''; ?>">
    <label for="mdp">Mot de Passe</label>
    <input type="password" name="mdp" id="mdp">
    <input type="checkbox" name="remember" <?php if(isset($_COOKIE['identifiant'])){
        echo "checked";
    } ?>>
    <input type="submit" value="Se connecter">
</form>

<?php

include("inc/bas.inc.php");
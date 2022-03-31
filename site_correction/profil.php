<?php
include("inc/init.inc.php");
include("inc/haut.inc.php");
if(isConnected()){
    $idMembre = $_SESSION['membre']['id_membre'];
    $memberData = $pdo->query("SELECT * FROM membre WHERE id_membre = '$idMembre'");
}else{
    header('location:connexion.php');
}
?>

<div class="profil-info">
    <ul>

<?php 
    $data = $memberData->fetch(PDO::FETCH_ASSOC);
    echo "<li>Votre pseudo est $data[pseudo] </li>";
    echo "<li>Votre nom est $data[nom] </li>";
    echo "<li>Votre prenom est $data[prenom] </li>";
    echo "<li>Votre email est $data[email] </li>";
    echo "<li>Vous habitez $data[adresse] à $data[ville]c</li>";
?>
    </ul>
</div>

<?php
include("inc/bas.inc.php");


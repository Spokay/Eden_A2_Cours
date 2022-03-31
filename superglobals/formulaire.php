<?php
echo '<br>';
if (!empty($_POST)){
    echo "Votre nom est  :". $_POST['nom']."<br>";
    echo "Votre prenom est  :". $_POST['prenom']."<br>";
    echo "Votre age est  :". $_POST['age']."<br>";
}

?>

<!--<form action="" method="post">
    <input type="text" name="prenom">
    <input type="text" name="nom">
    <input type="number" name="age">
    <input type="submit" value="envoyer">
</form>

-->


<!--<form action="page2.php" style="display: flex; flex-direction: column;width: 400px" method="post">
    <select name="marque">
        <option>Renault</option>
        <option>Mercedes</option>
        <option>Fiat</option>
    </select>
    <select name="modele">
        <option>Monospace</option>
        <option>4x4</option>
        <option>Berline</option>
        <option>SUV</option>
    </select>
    <input type="color" name="couleur">
    <input type="number" name="kilometres">
    <select name="carburant">
        <option>Essence</option>
        <option>Diesel</option>
        <option>Hybride</option>
        <option>Bioéthanol</option>
    </select>
    <select name="annee">
        <?php
/*            $yearI = 2021;
            while($yearI > 1900){
                echo '<option>' . $yearI . '</option>';
                $yearI--;
            }
        */?>
    </select>
    <input type="number" name="prix">
    <input type="submit" value="envoyer">
</form>-->



<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <fieldset>
        <legend><b>Votez pour votre joueur préféré! </b></legend>
        <p>
            <?php $joueurs = array("griez" => "Griezman", "payet" => "Payet", "pogba" => "Pogba");
            ?>
            Griezman<input type="radio" name="vote" value="griez" /> <br />
            Payet<input type="radio" name="vote" value="payet" /> <br />
            Pogba<input type="radio" name="vote" value="pogba" /> <br />
            <input type="submit" value="Voter" />
            <input type="submit" value="Afficher les résultats" name="affiche" />
        </p>
    </fieldset>
</form>
<?php
// Enregistrement
if (isset($_POST["vote"])) {
    $vote = $_POST["vote"];
    echo "<h2>Merci de votre vote pour " . $joueurs[$vote] . "</h2> ";
    if (file_exists("votes.txt")) {
        if ($id_file = fopen("votes.txt", "a")) {
            flock($id_file, 2);
            fwrite($id_file, $vote . "\n");
            flock($id_file, 3);
            fclose($id_file);
        } else {
            echo "Fichier inaccessible";
        }
    } else {
        $id_file = fopen("votes.txt", "w");
        fwrite($id_file, $vote . "\n");
        fclose($id_file);
    }
} else {
    echo "<h2>Complétez le formulaire puis cliquez sur 'Voter' !</h2> ";
} // Affichage des résultats
//Initialisation du tableau des résultats 
$result = array("Griezman" => 0, "Payet" => 0, "Pogba" => 0);
// Affichage des résultats
if (isset($_POST["affiche"])) {
    if ($id_file = fopen("votes.txt", "r")) {
        while ($ligne = fread($id_file, 6)) {
            switch ($ligne) {
                case "griez\n":
                    $result["Griezman"]++;
                    break;
                case "payet\n":
                    $result["Payet"]++;
                    break;
                case "pogba\n":
                    $result["Pogba"]++;
                    break;
                default:
                    break;
            }
        }
        fclose($id_file);
    }
    $total = ($result["Griezman"] + $result["Payet"] + $result["Pogba"]) / 100;

    echo '<pre>';
    print_r($total);
    print_r($result);
    echo '</pre>';


    $tri = $result;
    arsort($tri);
    echo "<div style=\"border-style:double\" >";
    echo "<h3>Les résultats du vote</h3>";
    $i = 0;
    foreach ($tri as $nom => $score) {
        $i++;
        echo "<h4>$i<sup>e</sup> : ", $nom, " a $score voix soit ",
        number_format($score / $total, 2), "%</h4>";
    }
    echo "</div>";
}
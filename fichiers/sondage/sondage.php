<?php
$data = '';
function percent($num1, $num2, $num3, $num4){
    $perc =  100 * $num1 / ($num2 + $num3 + $num4);
    return round($perc, '3');
}
if (!empty($_POST)){
    if (isset($_POST['envoyer'])) {
        $values = [];
        if (!file_exists('sondage.txt')){
            file_put_contents('sondage.txt', '0;0;0');
        }
        if ($file = fopen('sondage.txt', 'r')) {
            while (false !== ($char = fgetc($file))) {
                $data .= $char;
            }
            $values = explode(';', $data);
        }
        if (isset($_POST['nom'])) {
            if ($file = fopen('sondage.txt', 'a')) {
                global $values;
                if ($_POST['nom'] == 'griezmann') {
                    $values[0]++;
                } elseif ($_POST['nom'] == 'pogba') {
                    $values[1]++;
                } elseif ($_POST['nom'] == 'payet') {
                    $values[2]++;
                }
                $dataToPut = implode(';', $values);
                file_put_contents('sondage.txt', $dataToPut);
            }
            fclose($file);
        }
    }if (isset($_POST['display'])){
        if ($file = fopen('sondage.txt', 'r')) {
            while (false !== ($char = fgetc($file))) {
                $data .= $char;
            }
            $values = explode(';', $data);
        }
        fclose($file);
        $griezmann = $values[0];
        $pogba = $values[1];
        $payet = $values[2];
    }

}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sondage</title>
</head>
<body>
<form action="" method="post">
    <fieldset>
    <div class="choix">
        <label for="griezmann">Griezmann</label>
        <input type="radio" name="nom" id="griezmann" value="griezmann">
        <label for="pogba">Pogba</label>
        <input type="radio" name="nom" value="pogba" id="pogba">
        <label for="payet">Payet</label>
        <input type="radio" name="nom" id="payet" value="payet">
    </div>
        <input type="submit" value="Envoyer" name="envoyer">
    </fieldset>
</form>
<form action="" method="post">
    <input type="submit" name="display" value="afficher les informations">
    <?php
    if (isset($_POST['display'])){
        $tab = [
            'Griezmann' => $griezmann,
            'Pogba' => $pogba,
            'Payet' =>$payet
        ];
        arsort($tab);
        foreach($tab as $key => $valeur){
            $perc = percent($valeur, $pogba, $payet, $griezmann);
            echo "<p>$key à $valeur votes, cela représente $perc %</p>";
        }
    }
    ?>
</form>
</body>
</html>
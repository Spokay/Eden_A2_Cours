<?php

if ($_POST){
    extract($_POST);
    $msg = "";
    if (!preg_match("#^(0[1-78])([\s\-\.]?([0-9]){2}){4}$#", $phone)){
        $msg = "Ce numéro de téléphone n'est pas valide";
        var_dump($phone);
    }else{
        $msg = "Ce numéro de téléphone est valide";
    }

    echo $msg;
}
?>

<form action="" method="post">
    <label for="phone">Numero de téléphone</label>
    <input type="tel" name="phone" id="phone" placeholder="06 00 00 00 00">
    <input type="submit">
</form>

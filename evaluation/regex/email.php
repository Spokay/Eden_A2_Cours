<?php

if ($_POST){
    extract($_POST);
    $msg = "";
    if (!preg_match("#^([a-z0-9\.\-_]+)@([a-z0-9\.\-_]+)((\.([a-z]){2,4})+)$#", $email)){
        $msg = "Cet email n'est pas valide";
        var_dump($email);
    }else{
        $msg = "Cet email est valide";
    }

    echo $msg;
}
?>

<form action="" method="post">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" placeholder="jeanmichel@domaine.fr">
    <input type="submit">
</form>

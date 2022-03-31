<?php
/*
if ($_POST){
    $phone = trim(htmlspecialchars($_POST['phone']));
    $msg = "";
    if (preg_match("#^0[1-78]([\s\-\.]?([0-9]){2}){4}$#", $phone)){
        $msg = "Ce numéro de téléphone est valide";
        var_dump($phone);
    }else{
        $msg = "Ce numéro de téléphone n\'est pas valide";
    }
    echo $msg;
}
*/?><!--

<form action="" method="post">
    <label for="phone">Numero de téléphone</label>
    <input type="tel" name="phone" id="phone" placeholder="06 00 00 00 00">
    <input type="submit">
</form>-->

<?php
/*
if ($_POST){
    $email = trim(htmlspecialchars($_POST['email']));
    $msg = "";
    if (preg_match("#^[a-z0-9\.\-_]+@[a-z0-9\.\-_]{2,}\.[a-z]{2,4}$#", $email)){
        $msg = "Cet email est valide";
        var_dump($email);
    }else{
        $msg = "Cet email n\'est pas valide";
    }
    echo $msg;
}
*/?><!--

<form action="" method="post">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" placeholder="jeanmichel@domaine.fr">
    <input type="submit">
</form>-->


<?php
$pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');

function filterIp($str){
    $res = preg_replace("#[^0-9.,]#", '', $str);
    return $res;
}
function deleteSpaces($str){
    $res = preg_replace("#\s#", '', $str);
    return $res;
}
function deleteAllChars($str){
    $res = preg_replace("#[^a-zA-Z0-9\s]#", '', $str);
    return $res;
}


$visiteur84 = $pdo->query("SELECT nom FROM visiteur WHERE ip REGEXP '(^84.254)'")->fetchAll(PDO::FETCH_ASSOC);
echo"<pre>";
print_r($visiteur84);
echo"</pre>";

if (!empty($_POST)){
    echo filterIp('$123,34.00A').'<br>';
    echo deleteSpaces('ok mec ok').'<br>';
    echo deleteAllChars('!dzaijzfo,  depzdlzdap');
}
?>
<form action="" method="post">
    <input type="submit" value="déclencher le script" name="ok">
</form>




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
    echo deleteAllChars('!dzaijzfo, depzdlzdap');
}
?>
<form action="" method="post">
    <input type="submit" value="déclencher le script" name="ok">
</form>

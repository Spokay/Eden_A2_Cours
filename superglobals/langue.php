<?php
/*if (isset($_GET['pays'])){
    setcookie('lang', $_GET['pays'], time() + (60 * 60 * 24 * 365));
    header('location:langue.php');
}*/
if(isset($_GET['pays'])){
    $pays = $_GET['pays'];
}elseif(isset($_COOKIE['pays'])){
    $pays = $_COOKIE['pays'];
}else{
    $pays = 'en';
}
setcookie('pays', $pays, time() + (60*60*24*365));
?>

<a href="?pays=fr">French</a>
<a href="?pays=en">English</a>
<a href="?pays=it">Italian</a>
<a href="?pays=es">Spanish</a>
<?php

switch($pays){
    case 'fr':
        echo "Bonjour";
        break;
    case 'en':
        echo "Hello";
        break;
    case 'it':
        echo "Buongiorno";
        break;
    case 'es':
        echo "Buenos dias";
        break;
    default:
        echo "cette langue n'est pas disponible";
}





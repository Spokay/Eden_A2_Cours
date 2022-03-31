<?php
session_start();
$_SESSION['nom'] = 'macron';
$_SESSION['prenom'] = 'emmanuel';

//cookie
/*$annee = 60 * 60 * 24 * 365;
setcookie('nomDuCookie', 'contenuDuCookie', time() + $annee);*/
//session

// _SERVER
/*echo '<pre>';
print_r($_SERVER);
echo '</pre>';

echo '<pre>';
print_r($_SERVER['DOCUMENT_ROOT']);
echo '</pre>';
*/

// GLOBALS
/*$nb1 = 2;
$nb2 = 3;
function note(){
    $res = $GLOBALS['nb1'] + $GLOBALS['nb2'] . '<br>';
    return $res;
}
echo note();*/



// _GET
/*$fruit = ['orange', 'pomme', 'banane'];

echo "<a href='?choix=1'>quel fruit préférez vous ?</a> <br>";
echo "<a href='?choix=2'>quel fruit préférez vous ?</a> <br>";
echo "<a href='?choix=3'>quel fruit préférez vous ?</a> <br>";

if (isset($_GET["choix"]) && $_GET["choix"] == 1){
    echo "vous avez choisis de manger une $fruit[0]";
}
if (isset($_GET["choix"]) && $_GET["choix"] == 2){
    echo "vous avez choisis de manger une $fruit[1]";
}
if (isset($_GET["choix"]) && $_GET["choix"] == 3){
    echo "vous avez choisis de manger une $fruit[2]";
}*/

// _POST


?>

<!--<form action="" method="post">
    <input type="text" name="prenom">
    <input type="text" name="nom">
    <input type="submit" value="envoyer">
</form>
--><?php
/*var_dump($_POST);
echo '<br>';
if (!empty($_POST)){
    echo "Votre nom est  :". $_POST['nom']."<br>";
    echo "Votre prenom est  :". $_POST['prenom']."<br>";
}*/


/* ------ COOKIES ------ */

// pour définir un cookie on utilise la fonction setcookie ils sont toujours défini en haut de la page voir en haut pour l'exemple

/*if (!empty($_COOKIE) && isset($_COOKIE['nomDuCookie'])){
    echo $_COOKIE['nomDuCookie'];
}*/

/* ------ SESSION ------ */

// les sessions servent a conserver les information dans le navigateur
// session_start() permet de démarrer une session et se met en haut de la page après les cookies

// unset enlève un élément en particulier dans le tableau
unset($_SESSION['nom']);
print_r($_SESSION);

// session destroy détruit completement la session
session_destroy();

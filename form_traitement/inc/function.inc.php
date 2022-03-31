<?php

function debug($var, $mode = 1) // si je ne fournit que le 1er argument par défaut à l'exécution il prendra la valeur de la 2nd variable déclarée en argument
{
   // COULEUR DU FOND ALEATOIRE
   // $tab_couleur = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f');
   $tab_couleur = array('DA9F93', 'F2D5F8', 'DDBDD5', 'B8E1FF', 'F7C59F', '7EB09B', 'C8FFBE', 'CBAC88', 'EDFF7A', '5DD9C1', '8FD694', 'C0DA74', 'BEEDAA', 'FFD275', 'C6C8EE');
   // echo '<pre>'; var_dump($tab_couleur); echo '</pre>';
   $code_couleur = $tab_couleur[rand(0, 15)];

   // for ($i = 0; $i < 6; $i++) {
   //     $code_couleur .= $tab_couleur[rand(0, 15)]; // ou $code_couleur = $code_couleur . $tab_couleur[rand(0, 15)];
   // }
   // rand() est une fonction prédéfinie permettant de récupérer une valeur aléatoire contenue entre deux entiers

   // RECUPERATION DES INFORMATIONS SUR LE FICHIER DANS LEQUEL ON APPELLE LA FONCTION
   $trace = debug_backtrace(); // la fonction debug_backtrace retourne un tableau ARRAY contenant des informations telles que la ligne et le fichier où est exécutée cette fonction
   // echo '<hr />'; var_dump($trace); echo '<hr />';
   $trace = array_shift($trace); // retire le 1er élément du tableau et réordonne tous les éléments pour qu'il n'y ait pas de vide

   // AFFICHAGE
   echo '<div style="background-color: #'.$code_couleur.'; padding: 5vh;">';
   if ($mode === 1) {
      echo '<p>VAR_DUMP() demandé dans le fichier : ' . $trace['file'] . ' à la ligne ' . $trace['line'] . '</p>';
      echo '<pre>';
      var_dump($var);
      echo '</pre>';
   } else {
      echo '<p>PRINT_R() demandé dans le fichier : ' . $trace['file'] . ' à la ligne: ' . $trace['line'] . '</p>';
      echo '<pre>';
      print_r($var);
      echo '</pre>';
   }

   echo '</div>';
}
// si on passe un seul argument  debug($arg); => var_dump
// si on passe deux arguments et que le 2nd argument n'est pas 1  debug($arg, $arg2); => print_r
<?php

// il existe deux types d'expressions régulières : POSIX / PCRE
// les fonctions utilisant PCRE comment toujours par 'preg_'


//preg_match();

/*if (preg_match('regex demandé', 'dans quoi vous faites la recherche')){
    echo "le mot que vous cherchez se trouve dans la chaine";
}else{
    echo "le mot que vous cherchez ne se trouve pas dans la chaine";
}*/

/*if (preg_match('#bonjour#', 'bonjour tout le monde')){
    echo "le mot que vous cherchez se trouve dans la chaine";
}else{
    echo "le mot que vous cherchez ne se trouve pas dans la chaine";
}*/

// Pour que les majuscules ne soient pas un problème on met un 'i' après le délimiteur
/*if (preg_match('#Guitare#i', 'J\'aime jouer à la guitare')){
    echo "le mot que vous cherchez se trouve dans la chaine";
}else{
    echo "le mot que vous cherchez ne se trouve pas dans la chaine";
}*/
// après le délimiteur c'est les options

/*if (preg_match('#Guitare|piano|banjo#i', 'J\'aime jouer au piano')){
    echo "le mot que vous cherchez se trouve dans la chaine";
}else{
    echo "le mot que vous cherchez ne se trouve pas dans la chaine";
}*/
// le pipe permet de faire un 'OU'


// l'accent circonflex au début permet de de forcer le mot à etre au debut
/*if (preg_match('#^bonjour#i', 'bonjour tout le monde')){
    echo "le mot que vous cherchez se trouve dans la chaine";
}else{
    echo "le mot que vous cherchez ne se trouve pas dans la chaine";
}*/
// le signe $ à la fin permet de forcer le mot à etre a la fin
/*if (preg_match('#bonjour$#i', 'Bonjour tout le monde bonjour')){
    echo "le mot que vous cherchez se trouve dans la chaine";
}else{
    echo "le mot que vous cherchez ne se trouve pas dans la chaine";
}*/
// entourer le mot des deux caractères vu précedemment permet de forcer a ce qu'il n'y ait qu'un seul mot correspondant



// classes de caractères
//ce qui se trouve entre crochet est un suite de choix possibles
/*if (preg_match('#[aeiouy]$#', 'je suis un vrais zéro')){
    echo "le mot que vous cherchez se trouve dans la chaine";
}else{
    echo "le mot que vous cherchez ne se trouve pas dans la chaine";
}*/


// il suffit qu'il y ait 1 caractère qui ne soit pas dans le pattern entre crochet avec l'accent circonflex pour rentrer dans le if
// l'accent circonflex permet d'eliminer les possibilités d'apres
/*if (preg_match('#[^3-9]#', '33')){
    echo "le mot que vous cherchez se trouve dans la chaine";
}else{
    echo "le mot que vous cherchez ne se trouve pas dans la chaine";
}*/


// les quantificateurs

/*Vous devez retenir trois symboles :
? (point d'interrogation) : ce symbole indique que la lettre est facultative. Elle peut y être 0 ou 1 fois . Ainsi,#a?#reconnaît 0ou 1« a » ;

+ (signe plus) : la lettre est obligatoire. Elle peut apparaître 1 ou plusieurs fois. Ainsi, #a+# reconnaît « a », « aa », « aaa », « aaaa », etc. ;

* (étoile) : la lettre est facultative. Elle peut apparaître 0, 1 ou plusieurs fois.Ainsi, #a*# reconnaît « a », « aa », « aaa », « aaaa », etc. Mais s'il n'y a pas de « a », ça fonctionne aussi ! */

/*if (preg_match('#bor?is#', 'borris')){
    echo "le mot que vous cherchez se trouve dans la chaine";
}else{
    echo "le mot que vous cherchez ne se trouve pas dans la chaine";
}*/

// les parenthèses séléctionnent un élément a conditionner avec les accolades après ou avec des quantificateurs

/*if (preg_match("#Ay(ay){0,4}#", 'Ayayayayay')){
    echo "le mot que vous cherchez se trouve dans la chaine";
}else{
    echo "le mot que vous cherchez ne se trouve pas dans la chaine";
}*/

// eeeee => #(e){5}# true
// Yahoooo => #^Yaho+$# true
// ooo => #u?# true
// yahooo c'est génial => #^yahoo+$# false

if (preg_match('#^Yaho+$#', 'Yahooo')){
    echo "le mot que vous cherchez se trouve dans la chaine";
}else{
    echo "le mot que vous cherchez ne se trouve pas dans la chaine";
}

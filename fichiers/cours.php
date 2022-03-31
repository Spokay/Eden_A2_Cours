<?php
//file_get_contents(); permet récupérer le contenu d'un fichier et de le renvoyer en chaine de caractère

/*$contenu = file_get_contents('fichier.txt');
echo $contenu;*/

//readfile(); permet de récupérer le nombre de caractère d'un fichier et de l'afficher automatiquement

/*$contenu = readfile('fichier.txt');
echo " <br>ce fichier fait $contenu caractère";*/


// file(); récupère chaques lignes d'un fichier comme la valeur d'un tableau
/*$tableau = file('fichier.txt');
echo "<pre>";
print_r($tableau);
echo "</pre>";*/

// file_put_content(); permet d'écraser le contenu d'un fichier par le contenu du deuxième paramètre, si le fichier n'existe pas il le créee

/*$contenu = "Bonjour monsieur dupond";
file_put_contents('fichier.txt', $contenu);*/


/*
La fonction fopen() permet de déclencher l'ouverture du fichier. Cette fonction a deux paramètres: le nom du fichier et le mode d'ouverture du fichier.
Vous remarquez le caractère 'r' en deuxième paramètre.
Le 'r' signifie que vous ouvrez le fichier en lecture seule.
Le 'r+' signifie que vous ouvrez le fichier en lecture/écriture
Le 'w' signifie que vous ouvrez le fichier en écriture seule, vide le fichier et le crée s'il n'existe pas.
Le 'w+' signifie que vous ouvrez le fichier en lecture/écriture, vide le fichier et le crée s'il n'existe pas.
Le 'a' signifie que vous ouvrez le fichier en écriture seule en ajout et crée le fichier s'il n'existe pas.
Le 'a+' signifie que vous ouvrez le fichier en lecture/écriture en ajout et crée le fichier s'il n'existe pas.
*/
// ne pas oublier le fclose(); a la fin
/*$ressource = fopen('fichier.txt', 'r');
if (!$ressource) {
    echo "impossible d'ouvrir le fichier";
}
while (false != ($char = fgetc($ressource))) {
    echo $char;
}
fclose($ressource);*/

//fgets(); permet de lire le fichier ligne par ligne
//fgetc(); permet de lire le fichier caractère par caractère

/*$ressource = fopen('fichier.txt', 'r+');
fputs($ressource, 'Bonjour...');
fseek($ressource, 100);
fputs($ressource,'Bonjour...');
echo ftell($ressource)."<br>";
rewind($ressource);
echo ftell($ressource);
fclose($ressource);*/

//fputs(); permet de rajouter quelque chose au début d'un fichier il prend en premier parametre une ressource et en deuxième les données
//ftell(); permet de connaitre la position actuelle du curseur sur le fichier;
//fseek(); permet de changer le curseur de place il prend en premier parametre une ressource et en deuxième le placement. 0 représente le début du fichier
//frewind(); permet de replacer le curseur au début du fichier


/*$ressource = fopen('fichier.txt', 'r+');
copy('fichier.txt', 'autre.txt');
fclose($ressource);*/


// copy(); permet de copier un fichier cette fonction prend en paramètre le nom du fichier de depart et le nom du fichier de destination
// touch() permet de créer un fichier cette fonction prend en paramètre le nom du fichier, si le fichier existe déja seule la date de dernière modification est modifiée un deuxième paramètre permet de créer le fichier a partir d'un autre

//file_exists(); permet de vérifier si un fichier existe renvoies true si le fichier existe et renvoies false si il n'exste pas
// la fonction unlink(); permet de supprimer un fichier cette fonction prend en paramètre une chaine de caractère avec le nom du fichier, il faut penser a vérifier si le fichier existe avant sinon php peut renvoyer des erreurs
/*echo filesize('fichier.txt');*/
//filesize(); permet de retourner la taille d'un fichier
/*var_dump(is_dir('/xampp/htdocs/A2_cours'));*/
//is_dir(); retourne true si le dossier existe et retourne false si il n'existe pas, cette fonction prend en paramèrte une chaine de caractère avec le nom du dossier

/*$ressource = fopen('fichier.txt', 'r+');

$directory = dir('/xampp/htdocs/A2_cours/fichiers');
echo "<pre>";
print_r(get_class_methods($directory));
echo "</pre>";
while ($val = $directory->read()){
    if ($val != '.' && $val != '..') {
        if (is_dir($val)) {
            $dir2 = dir("./$val");
            while ($val2 = $dir2->read()) {
                if ($val2 != '.' && $val2 != '..') {
                    echo $val2 . "<br>";
                }
            }
        }else{
            echo $val . "<br>";
        }
    }
}
fclose($ressource);*/
//dir(); retourne une instance de la classe Directory, c'est a dire que cette fonction vas selectionner un dossier ce qui permettra ensuite de
/*
$ressource = opendir("/xampp/htdocs/A2_cours/fichiers");

while ($val = readdir($ressource)){
    echo $val . "<br>";
}*/

//la fonction opendir(); permet d'ouvrir un dossier le premier paramètre contient le nom du dossier
echo filetype("/xampp/htdocs/A2_cours/fichiers/autre.txt");
//filetype(); permet de connaitre le type du paramètre demandé avec un PATH
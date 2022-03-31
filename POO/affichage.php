<?php
require('Person.php');
require('Product.php');

$alain = new Person('delon', 'alain', 37);
$nom = $alain->getName();
$prenom = $alain->getFirstName();
$age = $alain->getAge();

$montre = new Product('montre', 200, 3);
$telephone = new Product('telephone', 1400, 2);

//echo "Je m'appeles $macron->prenom $macron->nom j'ai $macron->age je viens d'acheter $montre->quantite $montre->nom à $montre->prix euros au total <br>";

echo "Je m'appeles $prenom $nom j'ai $age";





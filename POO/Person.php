<?php

/*class Person{
    public $prenom = '';
}
$jean = new Person;
$joseph = new Person;
echo $jean->prenom = 'jean';
echo $joseph->prenom = 'joseph';*/


// la visibilité public est la visibilité la plus large elle est accessible directement en dehors et a l'intérieur de la classe

// un attribut ou une methode déclarée comme public les rendent accesibles de partout autant depuis l'intérieur de l'objet qu'a l'extérieur

// private est la plus restrictive, accessible uniquement depuis la class courante. Seule la class elle meme peut accéder à une methode ou à un attribut.

// protected est intermétiaire les methodes et attributs seront visibles par la class courante, toutes les class filles mais inaccessibles en dehors des classes mères et filles




class Person{
    private $prenom;
    private $nom;
    private $age;

   public function __construct($nom, $prenom, $age)
    {
        $this->nom = $nom;
        $this->setName($nom);
        $this->setFirstName($prenom);
        $this->setAge($age);
    }
    public function setName($name){
        $this->nom = $name;
    }
    public function setFirstName($firstName){
        $this->prenom = $firstName;
    }
    public function setAge($age){
        $this->age = $age;
    }
    public function getName(){
        return $this->nom;
    }
    public function getFirstName(){
        return $this->prenom;
    }
    public function getAge(){
        return $this->age;
    }
}

//les getters permettent de recuperer la valeur de données privées sans y acceder à l'exterieur
//les setteurs mutateurs permettent de changer l'état de données en vérifiant si la valeur que nous voulons apporter à la donnée respectent les normes de celle-ci


class Animal{
    private $nom;
    private $prix;
    public function getName(){
        return $this->nom;
    }
    public function getPrice(){
        return $this->prix;
    }
    public function setName($name){
        $this->nom = $name;
    }
    public function setPrice($prix){
        $this->prix = $prix;
    }
}

class Chien extends Animal{
    public function setAll($nom, $prix){
        $this->setName($nom);
        $this->setPrice($prix);
    }
}
class Chat extends Animal{
    public function __construct($nom, $prix){
        $this->setName($nom);
        $this->setPrice($prix);
    }
}

// un héritage permet de créer une classe à partir d'une autre classe en récupérant toutes les methodes et propriete qui ne sont pas private

$milou = new Chien();
$milou->setAll('milou', 100);

$bibi = new Chat('bibi', 150);
echo "je m'appeles ". $milou->getName() ." et je coute ". $milou->getPrice(). '<br>';
echo "je m'appeles ". $bibi->getName() ." et je coute ". $bibi->getPrice();





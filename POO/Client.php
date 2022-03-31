<?php

class Client{
    private $cin;
    private $nom;
    private $prenom;
    private $tel;
    public function setCin($cin){
        $this->cin = $cin;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function setTel($tel){
        $this->tel = $tel;
    }
    public function getCin(){
        return $this->cin;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getTel(){
        return $this->tel;
    }
    public function Afficher(){
        echo $this->getCin().'<br>'.$this->getNom().'<br>'.$this->getPrenom().'<br>'.$this->getTel().'<br>';
    }
    public function __construct($cin, $nom, $prenom, $tel){
        $this->setCin($cin);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setTel($tel);
    }
}

class Compte{
    private $solde = 0;
    private static $id;
    private $proprietaire;
    public function setProprietaire($proprietaire){
        $this->proprietaire = $proprietaire;
    }
    public function getProprietaire(){
        return $this->proprietaire;
    }
    public function getId(){
        return self::$id;
    }
    public function getSolde(){
        return $this->solde;
    }
    public function Crediter($somme, $debiteur = null){
        if (isset($debiteur)){
            $debiteur->solde -= $somme;
        }
        $this->solde += $somme;

    }
    public function Debiter($somme, $crediteur = null){
        if (isset($crediteur)){
            $crediteur->solde += $somme;
        }
        $this->solde -= $somme;
    }
    public function resume(){
        echo "<p>Ce compte appartient à l'utilisateur ". $this->proprietaire->getPrenom().' '. $this->proprietaire->getNom() ." et son solde est de " . $this->getSolde()."</p>";
    }
    public function nombreComptes(){
        echo self::$id;
    }
    public function __construct($proprietaire){
        $this->setProprietaire($proprietaire);
        self::$id++;
        echo '<pre>';
        var_dump(self::$id);
        echo '</pre>';
    }
}

$hugo = new Client(123456, 'Bressange', 'Hugo', 0601010101);
$melchior = new Client(654321, 'Delescluse', 'Melchior', 0610101010);

$hugoAccount = new Compte($hugo);
$mechiorAccount = new Compte($melchior);
echo '<pre>';
var_dump($hugoAccount);
echo '</pre>';

$hugoAccount->Crediter(100);
$hugoAccount->resume();
$hugoAccount->nombreComptes();

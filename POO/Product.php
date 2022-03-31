<?php

class Product{
    public $nom;
    public $prix;
    public $quantite;

    public function __construct($nom, $prix, $quantite)
    {
        $this->nom = $nom;
        $this->prix = $prix;
        $this->quantite = $quantite;
    }
}
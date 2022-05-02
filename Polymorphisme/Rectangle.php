<?php
require_once("Mobilier.php");
class Rectangle extends Mobilier{
    protected $longueur;
    protected $largeur;

    /**
     * @return mixed
     */
    public function getLongueur()
    {
        return $this->longueur;
    }

    /**
     * @param mixed $longueur
     */
    public function setLongueur($longueur)
    {
        $this->longueur = $longueur;
    }

    /**
     * @return mixed
     */
    public function getLargeur()
    {
        return $this->largeur;
    }

    /**
     * @param mixed $largeur
     */
    public function setLargeur($largeur)
    {
        $this->largeur = $largeur;
    }

    public function __construct(array $attributes, $largeur, $longueur)
    {
        parent::__construct($attributes);
        $this->setLargeur($largeur);
        $this->setLongueur($longueur);
    }

    public function getPerimetre(){
        return (($this->getLongueur() * 2) + ($this->getLargeur() * 2));
    }
    // cette fonction permet de récupérer la surface du rectangle
    public function getSurface(){
        return (($this->getLongueur() * $this->getLongueur()) * ($this->getLargeur() * $this->getLargeur()));
    }

}
<?php
require_once("Mobilier.php");
class Rond extends Mobilier{
    protected $diametre;

    /**
     * @return mixed
     */
    public function getDiametre()
    {
        return $this->diametre;
    }

    /**
     * @param mixed $diametre
     */
    public function setDiametre($diametre)
    {
        $this->diametre = $diametre;
    }

    public function __construct(array $attributes, $diametre)
    {
        parent::__construct($attributes);
        $this->setDiametre($diametre);
    }

    // cette fonction permet de récupérer le rayon a partir du diametre
    public function getRayon(){
        return ($this->getDiametre() / 2);
    }

    // cette fonction permet de récupérer le périmetre du rond
    public function getPerimetre(){
        return (2 * pi() * $this->getRayon());
    }
    // cette fonction permet de récupérer la surface du rond
    public function getSurface(){
        return (pi() * $this->getRayon() * $this->getRayon());
    }
}
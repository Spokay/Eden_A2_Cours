<?php
require_once("Mobilier.php");
class Carre extends Mobilier{
    protected $cotes;

    /**
     * @return mixed
     */
    public function getCotes()
    {
        return $this->cotes;
    }

    /**
     * @param mixed $cotes
     */
    public function setCotes($cotes)
    {
        $this->cotes = $cotes;
    }

    public function __construct(array $attributes, $cotes)
    {
        parent::__construct($attributes);
        $this->setCotes($cotes);
    }

    // cette fonction permet de récupérer le périmetre du carré
    public function getPerimetre(){
        return ($this->getCotes() * 4);
    }
    // cette fonction permet de récupérer la surface du carré
    public function getSurface(){
        return ($this->getCotes() * $this->getCotes());
    }
}
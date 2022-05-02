<?php
require_once("Mobilier.php");
abstract class Triangle extends Mobilier{
    protected $cote1;
    protected $cote2;
    protected $cote3;

    /**
     * @return mixed
     */
    public function getCote1()
    {
        return $this->cote1;
    }

    /**
     * @param mixed $cote1
     */
    public function setCote1($cote1)
    {
        $this->cote1 = $cote1;
    }

    /**
     * @return mixed
     */
    public function getCote2()
    {
        return $this->cote2;
    }

    /**
     * @param mixed $cote2
     */
    public function setCote2($cote2)
    {
        $this->cote2 = $cote2;
    }

    /**
     * @return mixed
     */
    public function getCote3()
    {
        return $this->cote3;
    }

    /**
     * @param mixed $cote3
     */
    public function setCote3($cote3)
    {
        $this->cote3 = $cote3;
    }

    public function __construct($attributes)
    {
        parent::__construct($attributes);
    }

    // cette fonction permet de récupérer le périmetre d'un triangle
    public function getPerimetre(){
        return ($this->getCote1() + $this->getCote2() + $this->getCote3());
    }

    abstract public function getSurface();
}
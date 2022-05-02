<?php
require_once("Triangle.php");
class TriangleRectangle extends Triangle{
    protected $cotesAngleDroit;

    /**
     * @return mixed
     */
    public function getCotesAngleDroit()
    {
        return $this->cotesAngleDroit;
    }


    public function setCotesAngleDroit(){
        $arr = [$this->getCote1(), $this->getCote2(), $this->getCote3()];
        sort($arr);
        $this->cotesAngleDroit = ['coteAngle1'=>$arr[0], 'coteAngle2'=>$arr[1]];
    }


    public function __construct($attributes, $cotesAngleDroit)
    {
        parent::__construct($attributes);
        $this->setCotesAngleDroit();
    }
    // cette fonction permet de récupérer la surface d'un triangle Rectangle
    public function getSurface(){
        return (($this->getCotesAngleDroit()['coteAngle1'] * $this->getCotesAngleDroit()['coteAngle2']) / 2);
    }

}
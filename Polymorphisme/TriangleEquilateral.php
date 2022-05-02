<?php
require_once("Triangle.php");
class TriangleEquilateral extends Triangle{

    public function __construct($attributes)
    {
        parent::__construct($attributes);
    }
    // cette fonction permet de récupérer la surface d'un triangle Rectangle
    public function getSurface(){
        return (($this->getCote1() * sqrt(3)));
    }

}
<?php


class Point{
    public $x;
    public $y;
    public function Afficher(){
        echo "$this->x, $this->y";
    }
    public function __construct($x, $y){
        $this->x = $x;
        $this->y = $y;
    }
}


class Cercle extends Point{
    public $centre;
    public $r;
    public function getPerimetre(){
        return (2 * pi() * $this->r);
    }
    public function getSurface(){
        return (($this->r * $this->r) * pi());
    }
    public function appartient($p): bool{
        $a = ($p->x - $this->centre[0]);
        $b = ($p->y - $this->centre[1]);
        $dist = sqrt(($a * $a) + ($b * $b));
        if ($dist <= $this->r){
            return true;
        }else{
            return false;
        }
    }
    public function Afficher(){
        echo "$this->x, $this->y, $this->r ";
    }
    public function __construct($centre, $r){
        $this->centre = $centre;
        $this->r = $r;
    }
}

$cercle = new Cercle([1, 1], 20);
$point = new Point(40, 40);
echo $point->Afficher(). '<br>';
echo $cercle->getSurface(). '<br>';
echo $cercle->getPerimetre(). '<br>';

var_dump($cercle->appartient($point));
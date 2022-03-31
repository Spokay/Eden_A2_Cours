<?php
/*class Rectangle{
    public $longueur;
    public $largeur;
    public function __construct($large, $long){
        $this->longueur = $long;
        $this->largeur = $large;
    }
    public function perimetre(){
        return ($this->longueur + $this->largeur) * 2;
    }
    public function aire(){
        return ($this->longueur * $this->largeur);
    }
    public function estCarre(){
        if ($this->largeur == $this->longueur){
            return "est un carré";
        }else{
            return "n'est pas un carré";
        }
    }
    public function afficherRectangle(){
        echo "Largeur : " . $this->largeur . " Longueur : " . $this->longueur . " Périmètre : " . $this->perimetre() ." ". $this->estCarre();
    }
}

$rect = new Rectangle(20, 20);
$rect->afficherRectangle();*/


class Strings{
    public $string;
    public $text;
    public $alphaLow;
    public $alphaUp;
    public function __construct($string){
        $this->string = $string;
        $this->alphaLow = range('a', 'z');
        $this->alphaUp = range('A', 'Z');
    }
    public function length(){
        $tab = [];
        $l = 0;
        while (@$this->string[$l]){
            $tab[] = $this->string[$l];
            $l++;
        }
        return count($tab);
    }
    public function charAt($pos){
        for($i = 0; $i < $this->length(); $i++){
            if ($pos == $i) {
                return $this->string[$i];
            }
        }
    }
    public function indexOf($char, $start = 0){
        for($j = $start; $j < $this->length(); $j++){
            if ($char === $this->string[$j]) {
                $this->text = $j;
                return $j;
            }
        }
        return -1;
    }
    public function substring(int $start, int $end = null){
        $res = [];
        if ($end === null){
            $end = $this->length();
        }
        for($k = $start; $k < $end; $k++){
            $res[] = $this->string[$k];
        }
        return implode('',$res);
    }
    public function split(){
       $tab = [];
        for ($m = 0;$m < $this->length(); $m++){
            $tab[] = $this->string[$m];
        }
        return $tab;
    }
    public function toLowerCase(){
        $str = '';
        for ($n = 0; $n < $this->length(); $n++){
            if(in_array($this->string[$n], $this->alphaUp)){
                $alpha = new Strings($this->alphaUp);
                $str.= $this->alphaLow[$alpha->indexOf($this->string[$n])];
            }elseif (in_array($this->string[$n], $this->alphaLow)){
                $str.=$this->string[$n];
            }else{
                $str.=$this->string[$n];
            }
        }
        return $str;
    }
    public function toUpperCase(){
        $str = '';
        for ($n = 0; $n < $this->length(); $n++){
            if (in_array($this->string[$n], $this->alphaLow)){
                $alpha = new Strings($this->alphaLow);
                $str.= $this->alphaUp[$alpha->indexOf($this->string[$n])];
            }elseif(in_array($this->string[$n], $this->alphaUp)){
                $str.=$this->string[$n];
            }else{
                $str.=$this->string[$n];
            }
        }
        return $str;
    }
}

$str = new Strings('ouaI tesT ouai');
echo $str->length().'<br>';
echo $str->charAt(1).'<br>';
echo $str->indexOf('t').'<br>';
echo $str->substring(0, 4).'<br>';
var_dump($str->split());
echo $str->toLowerCase().'<br>';
echo $str->toUpperCase().'<br>';
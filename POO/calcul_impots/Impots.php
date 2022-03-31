<?php
class Impots{
    const TAUX_BAS = 9;
    const TAUX_HAUT = 14;
    public $nom = '';
    public $result = 0;
    public $revenu = 0;
    public function __construct($revenu, $nom){
        $this->revenu = $revenu;
        $this->nom = $nom;
        $this->result = $this->CalculImpots($this->revenu);
    }
    public function CalculImpots($revenu){
        if ($revenu < 15000){
            return (($revenu * self::TAUX_BAS) / 100);
        }else{
            $res = $revenu - 15000;
            $taxe = ($res * self::TAUX_HAUT / 100);
            return ($taxe + ((15000 * self::TAUX_BAS) / 100));
        }
    }
    public function AfficheImpots(){
        echo "Mr $this->nom votre impôt est de $this->result euros";
    }
}
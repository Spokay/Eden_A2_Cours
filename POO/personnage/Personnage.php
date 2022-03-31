<?php
class Personnage{
    private $id;
    private $nom;
    private $degats;
    private $forces;
    private $localisation;
    private $experience;
    const FORCES_PETITE = 20;
    const FORCES_MOYENNE = 50;
    const FORCES_GRANDE = 80;
    const CEST_MOI = 1;
    const PERSONNAGE_TUE = 2;
    const PERSONNAGE_FRAPPE = 3;
    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }
    public function frappe(Personnage $perso){
        if ($perso->id() == $this->id){
            return self::CEST_MOI;
        }
        return $perso->recevoirDegats($this);
    }
    public function recevoirDegats($attacker){
        $this->setDegats($attacker::FORCES_PETITE);
        if ($this->degats >= 100){
            return self::PERSONNAGE_TUE;
        }
        return self::PERSONNAGE_FRAPPE;
    }
    public function degats(){
        return $this->degats;
    }
    public function nom(){
        return $this->nom;
    }
    public function id(){
        return $this->id;
    }
    public function forces(){
        return $this->forces;
    }
    public function localisation(){
        return $this->localisation;
    }
    public function experience(){
        return $this->experience;
    }
    public function setDegats($degats){
        $degats = (int)$degats;
        if ($degats >= 0 && $degats <= 100){
            $this->degats += $degats;
        }
    }
    public function setNom($nom){
        if (is_string($nom)){
            $this->nom = $nom;
        }
    }
    public function setId($id){
        $id = (int)$id;
        if ($id > 0){
            $this->id = $id;
        }
    }
    public function setForces($forces){
        $this->forces = $forces;
    }
    public function setExperience($experience){
        $this->experience = $experience;
    }
    public function setLocalisation($localisation){
        $this->localisation = $localisation;
    }
    public function hydrate(array $donnees){
        foreach($donnees as $key => $value){
            $method = "set".ucfirst($key);
            if(method_exists($this,$method)) {
                $this->$method($value);
            }
        }
    }


}

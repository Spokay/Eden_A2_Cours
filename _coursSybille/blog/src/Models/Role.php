<?php
namespace Blog\Models;

/** Class Role **/
class Role {

    private $Id_role;
    private $Libelle_role;


    public function getLibelle_role() {
        return $this->Libelle_role;
    }

    public function getId_role() {
        return $this->Id_role;
    }


    public function setLibelle_role(String $Libelle_role) {
        $this->Libelle_role = $Libelle_role;
    }

    public function setId_role(Int $Id_role) {
        $this->Id_role = $Id_role;
    }

}

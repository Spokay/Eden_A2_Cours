<?php
namespace Blog\Models;

/** Class User **/
class User {

    private $Login;
    private $PW;
    private $Id_user;
    private $Libelle_role;
    private $Id_role;

    public function getLogin() {
        return $this->Login;
    }

    public function getPW() {
        return $this->PW;
    }

    public function getId_user() {
        return $this->Id_user;
    }

    public function getId_role() {
        return $this->Id_role;
    }

    public function getLibelle_role() {
        return $this->Libelle_role;
    }

    public function setLogin(String $Login) {
        $this->Login = $Login;
    }

    public function setPW(String $PW) {
        $this->PW = $PW;
    }

    public function setId_user(Int $Id_user) {
        $this->Id_user = $Id_user;
    }

    public function setId_role(Int $Id_role) {
        $this->Id_role = $Id_role;
    }
}

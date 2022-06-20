<?php
namespace Blog\Models;

/** Class Article **/
class Article {

    private $Id_article;
    private $Titre;
    private $Date;
    private $Photo;
    private $Texte;
    private $Id_user;
    private $Login;

    public function getId_article() {
        return $this->Id_article;
    }

    public function getTitre() {
        return $this->Titre;
    }

    public function getPhoto() {
        return $this->Photo;
    }

    public function getDate() {
        return $this->Date;
    }

    public function getTexte() {
        return $this->Texte;
    }

    public function getId_user() {
        return $this->Id_user;
    }

    public function getLogin() {
        return $this->Login;
    }

    public function setId_article(Int $Id_article) {
        $this->Id_article = $Id_article;
    }

    public function setTitre(String $Titre) {
        $this->Titre = $Titre;
    }

    public function setDate(String $Date) {
        $this->Date = $Date;
    }

    public function setPhoto(String $Photo) {
        $this->Photo = $Photo;
    }

    public function setTexte(String $Texte) {
        $this->Texte = $Texte;
    }

    public function setId_user(Int $Id_user) {
        $this->Id_user = $Id_user;
    }

    public function setLogin(String $Login) {
        $this->Login = $Login;
    }

    
}

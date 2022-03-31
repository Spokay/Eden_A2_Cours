<?php
class DatabaseMySQL{
    private $dbhost;
    private $dbname;
    private $dbuser;
    private $dbpassword;
    public function setHost($host){
        $this->dbhost = $host;
    }
    public function setName($name){
        $this->dbname = $name;
    }
    public function setUser($user){
        $this->dbuser = $user;
    }
    public function setPassword($password){
        $this->dbhost = $password;
    }
    public function getHost(){
        return $this->dbhost;
    }
    public function getName(){
        return $this->dbname;
    }
    public function getUser(){
        return $this->dbuser;
    }
    public function getPassword(){
        return $this->dbpassword;
    }
    public function __construct($dbhost,$dbname,$dbuser,$dbpassword){
        $this->setHost($dbhost);
        $this->setName($dbname);
        $this->setUser($dbuser);
        $this->setPassword($dbpassword);
    }
    public function createPdo(){
        $dsn = "mysql:host=".$this->getHost().";dbname=".$this->getName();
        $pdo = new Pdo($dsn, $this->getUser(), $this->getPassword());
        return $pdo;
    }
}
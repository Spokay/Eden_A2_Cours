<?php
class UserManager{
    private $pdo;
    public function setPdo($pdo){
        $this->pdo = $pdo;
    }
    public function getPdo(){
        return $this->pdo;
    }
    public function __construct($pdo){
        $this->setPdo($pdo);
    }
    public function insert($table, $fields, $values){

    }
    public function update($table, $fields, $values){

    }
}
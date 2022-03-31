<?php
class PersonnageManager{
    private $_db;
    private $_pdo;
    public function __construct(DatabaseMySQL $db){
        $this->_db = $db;
        $this->_pdo = $this->_db->createPdo();
    }
    public function getPdo(){
        return $this->_pdo;
    }
    public function insert($table, $perso){
        $nom = $perso->nom();
        $this->getPdo()->exec("INSERT INTO $table SET nom = '$nom'");
    }
    public function update($table, $perso){
        /* update function bug */
        echo "<pre>";
        print_r($perso);
        echo "</pre>";
        $degats = $perso->degats();
        $xp = $perso->experience();
        $forces = $perso->forces();
        $localisation = $perso->localisation();
        $id = $perso->id();
        $this->getPdo()->exec("UPDATE $table SET degats = '$degats' WHERE id = '$id'");
    }
    public function personnagesList(){
        $res = $this->getPdo()->query("SELECT * FROM personnages");
        return $res;
    }
    public function selectPerso($id){
        return $this->getPdo()->query("SELECT * FROM personnages WHERE id = '$id'");
    }
}
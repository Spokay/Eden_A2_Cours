<?php
class PersonnageManager{
    public $_db;
    public $_pdo;
    public function __construct(DatabaseMySQL $db){
        $this->_db = $db;
        $this->_pdo = $this->_db->createPdo();
    }
    public function getPdo(){
        return $this->_pdo;
    }
    public function getDb(){
        return $this->_db;
    }
    public function add(Personnage $perso){
        $q = $this->_pdo->prepare("INSERT INTO personnages SET nom = :nom");
        $q->bindValue(':nom', $perso->nom());
        $q->execute();
        $perso->hydrate(array("id"=>$this->_pdo->lastInsertId(), "degats"=>0));
    }
    public function count(){
        $res = $this->_pdo->query("SELECT COUNT(*) FROM personnages")->fetchColumn();
        return $res;
    }
    public function delete(Personnage $perso){
        $this->_pdo->exec("DELETE FROM personnages WHERE id = '$perso->id()'");
    }
    public function exist($infos){
        if (is_int($infos)){
            return (bool) $this->_pdo->query('SELECT COUNT(*) FROM personnages WHERE id = '.$infos)->fetchColumn();
        }else{
            $q = $this->_pdo->prepare("SELECT COUNT(*) FROM personnages WHERE nom = :nom");
            $q->execute(array(':nom'=>$infos));
            return (bool) $q->fetchColumn();
        }
    }
    public function get($infos){
        if (is_int($infos)){
            $q = $this->_pdo->query("SELECT id, nom, degats FROM personnages WHERE id = '$infos'");
            $perso = $q->fetch(PDO::FETCH_ASSOC);
            return new Personnage($perso);
        }else{
            $q = $this->_pdo->prepare("SELECT id, nom, degats FROM personnages WHERE nom = :nom");
            $q->execute(array(':nom'=>$infos));
            $perso = $q->fetch(PDO::FETCH_ASSOC);
            return new Personnage($perso);
        }
    }
    public function getList($nom){
        $persos = array();
        $q = $this->_pdo->prepare("SELECT id, nom, degats FROM personnages WHERE nom <> :nom ORDER BY nom ASC");
        $q->execute(array(':nom'=>$nom));
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
            $persos[] = new Personnage($donnees);
        }
        return $persos;
    }
    public function update(Personnage $perso){
        $q = $this->_pdo->prepare("UPDATE personnages SET degats = :degats WHERE id = :id");
        $q->bindParam(':degats', $perso->degats(), PDO::PARAM_INT);
        $q->bindParam(':id', $perso->id(), PDO::PARAM_INT);
        $q->execute();
    }

}
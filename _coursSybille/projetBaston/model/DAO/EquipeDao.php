<?php
require_once('AccesBdd.php');
class EquipeDao{
    private $connexion;

    public function __construct()
    {
        $this->setConnexion();
    }

    /**
     * @return mixed
     */
    public function getConnexion()
    {
        return $this->connexion;
    }

    public function setConnexion()
    {
        $acces =  new AccesBdd();
        $this->connexion = $acces->getConnexion();
    }
    public function getAll(){

        try {
            $sql = 'SELECT * FROM equipe';

            $query = $this->getConnexion()->prepare($sql);

            $query->execute();

        }catch(PDOException $e){
            echo 'Erreur : '. $e->getMessage();
            die();
        }

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $listEquipes = array();

        foreach ($result as $equipe){
            $equipeObj = new Equipe($equipe);
            $listEquipes[] = $equipeObj;
        }

        return $listEquipes;
    }
    public function getTeamFromPersonnage($id){
        $sql = "SELECT * FROM equipe eq JOIN personnage pe ON eq.EQUIPEID = pe.EQUIPEID WHERE eq.EQUIPEID = '$id'";

        $query = $this->getConnexion()->prepare($sql);

        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
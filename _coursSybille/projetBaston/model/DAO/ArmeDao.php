<?php
require_once('AccesBdd.php');
require_once(realpath(dirname(__FILE__)) . '/../../../projetBaston/model/entities/Arme.php');
class ArmeDao{
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
        $sql = 'SELECT * FROM arme';

        $query = $this->getConnexion()->prepare($sql);

        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $listArmes = array();
        foreach ($result as $arme){
            $armeObj = new Arme($arme);
            $listArmes[] = $armeObj;
        }
        return $listArmes;
    }

    public function getOne($id){
        $sql = "SELECT * FROM arme WHERE ARMEID = '$id'";

        $query = $this->getConnexion()->prepare($sql);

        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        $arme = new Arme($result);

        return $arme;
    }
    public function getArmesFromPersonnage($id){
        $sql = "SELECT * FROM arme ar JOIN persoarme pa JOIN personnage pe ON ar.ARMEID = pa.ARMEID AND pa.PERSOID = pe.PERSOID WHERE pa.PERSOID = '$id'";

        $query = $this->getConnexion()->prepare($sql);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
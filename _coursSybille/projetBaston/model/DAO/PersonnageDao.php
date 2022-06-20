<?php
require_once('AccesBdd.php');
require_once(realpath(dirname(__FILE__)) . '/../../../projetBaston/model/entities/Personnage.php');
require_once(realpath(dirname(__FILE__)) . '/../../../projetBaston/model/entities/Arme.php');
require_once(realpath(dirname(__FILE__)) . '/../../../projetBaston/model/entities/Equipe.php');
require_once('EquipeDao.php');
require_once('ArmeDao.php');
class PersonnageDao{

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
            $sql = 'SELECT * FROM `Personnage`';

            $query = $this->getConnexion()->prepare($sql);

            $query->execute();

        }catch(PDOException $e){
            echo 'Erreur : '. $e->getMessage();
            die();
        }

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $lesPersonnages = array();

        foreach($result as $personnage){
            // create instance of all characters


            $arr = array('id' => $personnage['PERSOID'], 'nom' => $personnage['PERSONOM'],'equipe' => '', 'armes' => []);
            $perso = new Personnage($arr);
            $equipedao = new EquipeDao();
            $equipe = new Equipe($equipedao->getTeamFromPersonnage($personnage['EQUIPEID']));
            $perso->setEquipe($equipe);
            $armeDao = new ArmeDao();
            $armesPerso = $armeDao->getArmesFromPersonnage($personnage['PERSOID']);
            $armesArray = array();
            foreach ($armesPerso as $arme){
                $armesArray[] = new Arme($arme);
            }
            $perso->setArmes($armesArray);

            $lesPersonnages[] = $perso;
        }
        return $lesPersonnages;
    }
    public function getOne($id){

        try {
            $sql = "SELECT * FROM `Personnage` WHERE PERSOID = '$id'";

            $query = $this->getConnexion()->prepare($sql);

            $query->execute();

        }catch(PDOException $e){
            echo 'Erreur : '. $e->getMessage();
            die();
        }


        $result = $query->fetch(PDO::FETCH_ASSOC);

        // create instance of a character
        $arr = array('id' => $result['PERSOID'], 'nom' => $result['PERSONOM'],'equipe' => '', 'armes' => []);
        $perso = new Personnage($arr);
        $equipeDao = new EquipeDao();
        $equipe = new Equipe($equipeDao->getTeamFromPersonnage($result['EQUIPEID']));
        $perso->setEquipe($equipe);
        $armeDao = new ArmeDao();
        $armesPerso = $armeDao->getArmesFromPersonnage($result['PERSOID']);
        $armesArray = array();
        foreach ($armesPerso as $arme){
            $armesArray[] = new Arme($arme);
        }
        $perso->setArmes($armesArray);

        return $perso;
    }

    public function update($data){
        try {
            $persoNom =$data->getPersoNom();
            $persoEquipe =$data->getEquipe();
            $persoId =$data->getPersoId();
            $sql = "UPDATE Personnage SET PERSONOM = '$persoNom', EQUIPEID = '$persoEquipe' WHERE PERSOID = '$persoId'";
            $query = $this->getConnexion()->prepare($sql);
            $query->execute();

        }catch(PDOException $e){
            echo 'Erreur : '. $e->getMessage();
            die();
        }

    }
}
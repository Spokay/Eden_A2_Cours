<?php
class AccesBdd{
    private $connexion;
    private $host = "localhost";
    private $dbname = "baston";
    private $user = "root";
    private $password = "";
    /**
     * @return mixed
     */
    public function getConnexion()
    {
        return $this->connexion;
    }

    public function __construct()
    {
        try{
            // Connexion à la bdd
            $this->connexion = new PDO("mysql:host=$this->host;dbname=$this->dbname", "$this->user","$this->password");
            $this->connexion->exec('SET NAMES "UTF8"');
        } catch (PDOException $e){
            echo 'Erreur : '. $e->getMessage();
            die();
        }
    }

    public function close(){
        $this->connexion = null;
    }

}
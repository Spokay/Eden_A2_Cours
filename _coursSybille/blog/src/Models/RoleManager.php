<?php
namespace Blog\Models;

use Blog\Models\Role;
/** Class UserManager **/
class RoleManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /** Récupération de tous les rôles **/
    public function getAll()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM Role');
        $stmt->execute(array());
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Blog\Models\Role");
    }
}

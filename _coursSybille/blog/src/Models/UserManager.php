<?php
namespace Blog\Models;

use Blog\Models\User;
/** Class UserManager **/
class UserManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getBdd()
    {
        return $this->bdd;
    }

    /** Récupération du user à partir de son login **/
    public function find($username) {
        $stmt = $this->bdd->prepare("SELECT * FROM User WHERE login = ?");
        $stmt->execute(array(
            $username
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"Blog\Models\User");
        return $stmt->fetch();
    }

    /** Récupération de tous les user avec leur rôle **/
    public function all() {
        $stmt = $this->bdd->query('SELECT * FROM User INNER JOIN Role ON User.Id_role = Role.Id_role');
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Blog\Models\User");
    }

    /** Enregistrement du user **/
    public function store($password) {
        $stmt = $this->bdd->prepare("INSERT INTO User(login, PW, Id_role) VALUES (?, ?, ?)");
        $stmt->execute(array(
            $_POST["username"],
            $password,
            $_POST["role"],
        ));
    }
}

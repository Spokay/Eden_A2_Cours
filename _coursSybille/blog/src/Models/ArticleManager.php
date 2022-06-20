<?php
namespace Blog\Models;

use Blog\Models\Article;

/** Class ArticleManager **/
class ArticleManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    
    /** Enregistrement de l'article **/
    public function store() {
        $stmt = $this->bdd->prepare("INSERT INTO article(Titre, Date, Photo, Texte, id_user  ) VALUES (?, NOW(), ?, ?, ?)");
        $retour=$stmt->execute(array(
            $_POST["name"],
            $_FILES["photo"]["name"],
            $_POST["texte"],
            $_SESSION["user"]["id"]
        ));
        return $retour;
    }

    /** Suppression de l'article **/
    public function delete($slug) {
        
        $stmt = $this->bdd->prepare("DELETE FROM article WHERE id_article = ?");
        $stmt->execute(array(
            $slug
        ));
    }

    /** Récupération de tous les articles **/
    public function getAll()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM article INNER JOIN user ON user.Id_user=article.Id_user');
        $stmt->execute(array( ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Blog\Models\Article");
    }

    /** Récupération de l'article à partir de son id**/
    public function getArticle($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM article WHERE Id_article = ?');
        $stmt->execute(array(
            $id
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Blog\Models\Article");
    }
}

<?php
namespace Blog\Models;

use Blog\Models\Comment;

/** Class CommentManager **/
class CommentManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    
    /** Enregistrement du commentaire **/
    public function store($idArticle, $idComment = null) {
        $stmt = $this->bdd->prepare("INSERT INTO comment(Texte, Date, Id_user, Id_article, Id_comment_parent) VALUES (?, NOW(), ?, ?, ?)");
        $retour=$stmt->execute(array(
            $_POST["Texte"],
            $_SESSION["user"]["id"],
            $idArticle,
            $idComment
        ));
        return $retour;
    }

    /** Suppression du commentaire **/
    public function delete($slug) {
        
        $stmt = $this->bdd->prepare("DELETE FROM comment WHERE Id_comment = ?");
        $stmt->execute(array(
            $slug
        ));
    }

    /** Récupération de tous les commentaires **/
    public function getAll()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM comment INNER JOIN user ON user.Id_user=comment.Id_user');
        $stmt->execute(array( ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Blog\Models\Comment");
    }

    /** Récupération du commentaire à partir de son id**/
    public function getComment($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM comment WHERE Id_comment = ?');
        $stmt->execute(array(
            $id
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Blog\Models\Comment");
    }
}

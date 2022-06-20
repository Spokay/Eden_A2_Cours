<?php

namespace Blog\Controllers;

use Blog\Models\CommentManager;
use Blog\Validator;

/** Class CommentController **/
class CommentController {
    private $manager;
    private $validator;

    public function __construct() {
        $this->manager = new CommentManager();
        $this->validator = new Validator();
    }

    /** HomePage **/
    public function index() {
        require VIEWS . 'comment/homepage.php';
    }

    /** Formulaire de création d'comment **/
    public function create() {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }
        require VIEWS . 'comment/create.php';
    }

    /** Enregistrement du commentaire **/
    public function store($idArticle, $idComment = null) {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }
        $this->validator->validate([
            "Texte"=>["required", "min:2", "alphaComplet"],
        ]);
        $_SESSION['old'] = $_POST;

        //var_dump($this->validator->errors());
        if (!$this->validator->errors()) {
                $retour=$this->manager->store($idArticle, $idComment);

                header("Location: /article/$idArticle/");
        } else {
            header("Location: /article/$idArticle/");
        }
    }

    /** Suppression de l'comment **/
    public function delete($slug)
    {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }

        //suppression de l'image
        $photo="";
        $comments = $this->manager->getcomment($slug);
        foreach ($comments as $comment) {
            $photo = $comment->getPhoto();
        }
        if (!empty($photo))  { 
            unlink("image/".$photo);   
        }
        //suppression du commentaire
        $this->manager->delete($slug);
        
        header("Location: /dashboard");
    }



    /** Affichage d'un commentaire **/
    public function show($id) {
        $comments = $this->manager->getcomment($id);
        $comments = $this->manager->getAll();
        require VIEWS . 'Article/show.php';
    }

}

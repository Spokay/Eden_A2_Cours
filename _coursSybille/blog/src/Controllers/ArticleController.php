<?php

namespace Blog\Controllers;

use Blog\Models\ArticleManager;
use Blog\Models\CommentManager;
use Blog\Validator;

/** Class ArticleController **/
class ArticleController {
    private $manager;
    private $commentManager;
    private $validator;

    public function __construct() {
        $this->manager = new ArticleManager();
        $this->commentManager = new CommentManager();
        $this->validator = new Validator();
    }

    /** HomePage **/
    public function index() {
        require VIEWS . 'Article/homepage.php';
    }

    /** Formulaire de création d'article **/
    public function create() {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }
        require VIEWS . 'Article/create.php';
    }

    /** Enregistrement de l'article **/
    public function store() {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }
        $this->validator->validate([
            "name"=>["required", "min:2", "alphaComplet"],
            "texte"=>["required", "min:0", "alphaComplet"]
        ]);
        $_SESSION['old'] = $_POST;

        //var_dump($this->validator->errors());
        if (!$this->validator->errors()) {
                $retour=$this->manager->store();
                
                if (isset($_FILES["photo"])) {
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "image/".$_FILES["photo"]["name"]);
                }
                header("Location: /dashboard");
        } else {
            header("Location: /dashboard/nouveau");
        }
    }

    /** Suppression de l'article **/
    public function delete($slug)
    {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }

        //suppression de l'image
        $photo="";
        $articles = $this->manager->getArticle($slug);         
        foreach ($articles as $article) {
            $photo = $article->getPhoto();
        }
        if (!empty($photo))  { 
            unlink("image/".$photo);   
        }
        //suppression de l'article
        $this->manager->delete($slug);
        
        header("Location: /dashboard");
    }

    /** Affichage des articles **/
    public function showAll() {        
        $articles = $this->manager->getAll();
        require VIEWS . 'Article/index.php';
    }


    /** Affichage d'un article **/
    public function show($id) {
        $articles = $this->manager->getArticle($id);
        $comments = $this->commentManager->getAll();
        require VIEWS . 'Article/show.php';
    }

}

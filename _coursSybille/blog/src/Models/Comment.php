<?php
namespace Blog\Models;
/** Class Article **/
class Comment {
    private $Id_comment;
    private $Texte;
    private $Date;
    private $Id_user;
    private $Id_article;
    private $Id_comment_parent;
    private $Login;


    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->Login;
    }

    /**
     * @param mixed $Login
     */
    public function setLogin($Login): void
    {
        $this->Login = $Login;
    }

    /**
     * @return mixed
     */
    public function getIdComment()
    {
        return $this->Id_comment;
    }

    /**
     * @param mixed $Id_comment
     */
    public function setIdComment($Id_comment): void
    {
        $this->Id_comment = $Id_comment;
    }

    /**
     * @return mixed
     */
    public function getTexte()
    {
        return $this->Texte;
    }

    /**
     * @param mixed $Texte
     */
    public function setTexte($Texte): void
    {
        $this->Texte = $Texte;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * @param mixed $Date
     */
    public function setDate($Date): void
    {
        $this->Date = $Date;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->Id_user;
    }

    /**
     * @param mixed $Id_user
     */
    public function setIdUser($Id_user): void
    {
        $this->Id_user = $Id_user;
    }

    /**
     * @return mixed
     */
    public function getIdArticle()
    {
        return $this->Id_article;
    }

    /**
     * @param mixed $Id_article
     */
    public function setIdArticle($Id_article): void
    {
        $this->Id_article = $Id_article;
    }

    /**
     * @return mixed
     */
    public function getIdCommentParent()
    {
        return $this->Id_comment_parent;
    }

    /**
     * @param mixed $Id_comment_parent
     */
    public function setIdCommentParent($Id_comment_parent): void
    {
        $this->Id_comment_parent = $Id_comment_parent;
    }

    
}

<?php

abstract class Mobilier{
    protected $nom;
    /*protected $prix;
    protected $couleur;
    protected $matiere;
    protected $image;*/
    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * @param mixed $couleur
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }

    /**
     * @return mixed
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * @param mixed $matiere
     */
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function __construct($attributes)
    {
        $this->setNom($attributes);
        /*$this->setPrix($attributes['prix']);
        $this->setCouleur($attributes['couleur']);
        $this->setMatiere($attributes['matiere']);
        $this->setImage($attributes['image']);*/
    }


    // cette fonction permet de récupérer le périmetre
    public abstract function getPerimetre();
    // cette fonction permet de récupérer la surface
    public abstract function getSurface();
}
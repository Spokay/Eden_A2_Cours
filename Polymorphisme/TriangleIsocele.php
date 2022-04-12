<?php

class TriangleIsocele extends Triangle{
    protected $base;
    protected $hauteur;

    /**
     * @return mixed
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @param mixed $base
     */
    public function setBase($base)
    {
        $this->base = $base;
    }

    /**
     * @return mixed
     */
    public function getHauteur()
    {
        return $this->hauteur;
    }

    /**
     * @param mixed $hauteur
     */
    public function setHauteur($hauteur)
    {
        $this->hauteur = $hauteur;
    }
    // cette fonction permet de récupérer la surface d'un triangle isocèle
    public function getSurface(){
        return (($this->getBase() * $this->getHauteur()) / 2);
    }
}
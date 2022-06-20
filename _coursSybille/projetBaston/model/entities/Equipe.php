<?php
require_once(realpath(dirname(__FILE__)) . '/../../../projetBaston/model/entities/Personnage.php');

/**
 * @access public
 * @package projetBaston.model.entities
 */
class Equipe {
	/**
	 * @AttributeType int
	 */
	private $equipeId;
	/**
	 * @AttributeType string
	 */
	private $nom;
	/**
	 * @AssociationType projetBaston.model.entities.Personnage
	 * @AssociationMultiplicity *
	 */
	public $personnages = array();


    public function __construct(Array $donnees)
    {
        $this->setEquipeId($donnees['EQUIPEID']);
        $this->setNom($donnees['EQUIPENOM']);
    }

    /**
     * @return array
     */
    public function getPersonnages(): array
    {
        return $this->personnages;
    }

    /**
     * @param array $personnages
     */
    public function setPersonnages(array $personnages)
    {
        $this->personnages = $personnages;
    }

	/**
	 * @access public
	 * @param int equipeId
	 * @ParamType equipeId int
	 */
	public function setEquipeId($equipeId) {
		$this->equipeId = $equipeId;
	}

	/**
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getEquipeId() {
		return $this->equipeId;
	}

	/**
	 * @access public
	 * @param string nom
	 * @ParamType nom string
	 */
	public function setNom($nom) {
		$this->nom = $nom;
	}

	/**
	 * @access public
	 * @return string
	 * @ReturnType string
	 */
	public function getNom() {
		return $this->nom;
	}
}
?>
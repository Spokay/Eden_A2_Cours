<?php
require_once(realpath(dirname(__FILE__)) . '/../../../projetBaston/model/entities/Arme.php');
require_once(realpath(dirname(__FILE__)) . '/../../../projetBaston/model/entities/Equipe.php');

/**
 * @access public
 * @package projetBaston.model.entities
 */
class Personnage {
	/**
	 * @AttributeType int
	 */
	private $persoId;
	/**
	 * @AttributeType string
	 */
	private $persoNom;
	/**
	 * @AttributeType int
	 */
	private $persoVie = 100;
	/**
	 * @AssociationType projetBaston.model.entities.Arme
	 * @AssociationMultiplicity *
	 */
	private $armes = array();

    public function __construct($donnees)
    {
        $this->setPersoId($donnees['id']);
        $this->setPersoNom($donnees['nom']);
        $this->setEquipe($donnees['equipe']);
        $this->setArmes($donnees['armes']);
    }

    /**
     * @return array
     */
    public function getArmes(): array
    {
        return $this->armes;
    }

    /**
     * @param array $armes
     */
    public function setArmes(array $armes)
    {
        $this->armes = $armes;
    }

    /**
     * @return mixed
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * @param mixed $equipe
     */
    public function setEquipe($equipe)
    {
        $this->equipe = $equipe;
    }
	/**
	 * @AssociationType projetBaston.model.entities.Equipe
	 * @AssociationMultiplicity 1
	 */
	public $equipe;

	/**
	 * @access public
	 * @param int persoId
	 * @ParamType persoId int
	 */
	public function setPersoId($persoId) {
		$this->persoId = $persoId;
	}

	/**
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getPersoId() {
		return $this->persoId;
	}

	/**
	 * @access public
	 * @param string persoNom
	 * @ParamType persoNom string
	 */
	public function setPersoNom($persoNom) {
		$this->persoNom = $persoNom;
	}

	/**
	 * @access public
	 * @return string
	 * @ReturnType string
	 */
	public function getPersoNom() {
		return $this->persoNom;
	}

	/**
	 * @access public
	 * @param int persoVie
	 * @ParamType persoVie int
	 */
	public function setPersoVie($persoVie) {
		$this->persoVie = $persoVie;
	}

	/**
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getPersoVie() {
		return $this->persoVie;
	}
}
?>
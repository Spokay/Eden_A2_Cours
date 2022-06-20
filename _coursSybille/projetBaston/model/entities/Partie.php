<?php
require_once(realpath(dirname(__FILE__)) . '/../../../projetBaston/model/entities/Personnage.php');

/**
 * @access public
 * @package projetBaston.model.entities
 */
class Partie {
	/**
	 * @AttributeType int
	 */
	private $partieId;
	/**
	 * @AttributeType Date
	 */
	private $debut;
	/**
	 * @AssociationType projetBaston.model.entities.Personnage
	 * @AssociationMultiplicity *
	 */
	public $personnages = array();

	/**
	 * @access public
	 * @param int partieId
	 * @ParamType partieId int
	 */
	public function setPartieId($partieId) {
		$this->partieId = $partieId;
	}

	/**
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getPartieId() {
		return $this->partieId;
	}

	/**
	 * @access public
	 * @param Date_27 debut
	 * @ParamType debut Date
	 */
	public function setDebut(Date_27 $debut) {
		$this->debut = $debut;
	}

	/**
	 * @access public
	 * @return Date_27
	 * @ReturnType Date
	 */
	public function getDebut() {
		return $this->debut;
	}
}
?>
<?php
/**
 * @access public
 * @package projetBaston.model.entities
 */
class Arme {
	/**
	 * @AttributeType int
	 */
	private $armeId;
	/**
	 * @AttributeType string
	 */
	private $armeNom;
	/**
	 * @AttributeType int
	 */
	private $degats;

    public function __construct(Array $donnees)
    {
        $this->setArmeId($donnees['ARMEID']);
        $this->setArmeNom($donnees['ARMENOM']);
        $this->setDegats($donnees['ARMEDEGATS']);
    }

	/**
	 * @access public
	 * @param int armeId
	 * @ParamType armeId int
	 */
	public function setArmeId($armeId) {
		$this->armeId = $armeId;
	}

	/**
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getArmeId() {
		return $this->armeId;
	}

	/**
	 * @access public
	 * @param string armeNom
	 * @ParamType armeNom string
	 */
	public function setArmeNom($armeNom) {
		$this->armeNom = $armeNom;
	}

	/**
	 * @access public
	 * @return string
	 * @ReturnType string
	 */
	public function getArmeNom() {
		return $this->armeNom;
	}

	/**
	 * @access public
	 * @param int degats
	 * @ParamType degats int
	 */
	public function setDegats($degats) {
		$this->degats = $degats;
	}

	/**
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getDegats() {
		return $this->degats;
	}
}
?>
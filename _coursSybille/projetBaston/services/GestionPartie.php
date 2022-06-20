<?php
require_once(realpath(dirname(__FILE__)) . '/../../projetBaston/model/entities/Partie.php');

/**
 * @access public
 * @package projetBaston.services
 */
class GestionPartie {
	/**
	 * @AttributeType projetBaston.model.entities.Partie
	 */
	private $laPartie;

	/**
	 * @access public
	 * @return void
	 * @ReturnType void
	 */
	public function choisirJoueurs() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return void
	 * @ReturnType void
	 */
	public function frapperAdversaire() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param projetBaston.model.entities.Partie laPartie
	 * @ParamType laPartie projetBaston.model.entities.Partie
	 */
	public function setLaPartie(Partie $laPartie) {
		$this->laPartie = $laPartie;
	}

	/**
	 * @access public
	 * @return projetBaston.model.entities.Partie
	 * @ReturnType projetBaston.model.entities.Partie
	 */
	public function getLaPartie() {
		return $this->laPartie;
	}
}
?>
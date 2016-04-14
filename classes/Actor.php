<?php

class Actor {
	private $idActor;
	private $nom;
	private $prenom;

	/**
	 * Créer une instance Actor
	 *
	 * @param Array $datas Les attributs envoyé en paramètre lors de l'instanciation
	 */
	public function __construct($datas = array()){
		try {
		$this->hydrate($datas);
		} catch (Exception $e){
			echo $e->getMessage();
		}
	}

	/**
	 * Gère les affectations des attributs lors de l'instanciation.
	 * Affecte chaque clé de l'array au setter correspondant, en leur envoyant la valeur de la clé.
	 *
	 * @param Array $datas Les attributs envoyé en paramètre lors de l'instanciation.
	 */
	public function hydrate(array $datas){
		foreach ($datas as $key => $value){
			$method = 'set'.ucfirst($key);
			if(method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}

	/**
	 *
	 * @param int $id_actor
	 */
	public function setIdActor($id_actor){
		$this->idActor = (int)$id_actor;
	}

	/**
	 *
	 * @param string $nom
	 */
	public function setNom($nom){
		if(strlen($nom) > 100) throw new Exception('Le nom de l\'acteur est trop long.<br/>');
		else $this->nom = $nom;
	}

	/**
	 *
	 * @param int iprenom
	 */
	public function setPrenom($prenom){
		if(strlen($prenom) > 100) throw new Exception('Le prenom de l\'acteur est trop long.<br/>');
		else $this->prenom = $prenom;
	}

	/**
	 *
	 * @return int
	 */
	public function getIdActor(){
		return $this->idActor;
	}

	/**
	 *
	 * @return string
	 */
	public function getNom(){
		return $this->nom;
	}

	/**
	 *
	 * @return string
	 */
	public function getPrenom(){
		return $this->prenom;
	}
}
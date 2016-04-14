<?php

class Film {
	private $idFilm;
	private $nomFilm;
	private $annee;
	private $score;
	
	/**
	 * Créer une instance Film
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
	 * @param int $id_film
	 */
	public function setIdFilm($id_film){
		$this->idFilm = (int)$id_film;
	}

	/**
	 *
	 * @param string $nom_film
	 */
	public function setNomFilm($nom_film){
		if(strlen($nom_film) > 255) throw new Exception('Le nom du film est trop long.<br/>');
		else $this->nomFilm = $nom_film;
	}

	/**
	 *
	 * @param int $annee
	 */
	public function setAnnee($annee){
		$annee = (int)$annee;
		if($annee < 1900 && $annee >= date('Y') + 2) throw new Exception('La date n\'est pas valide');
		else $this->annee = $annee;
	}

	/**
	 *
	 * @param int $score
	 */
	public function setScore($score){
		$score = (int)$score;
		if($score < 0 || $score > 10) throw new Exception('Le score doit être entre 0 et 10<br/>');
		else $this->score = $score;
	}

	/**
	 *
	 * @return int
	 */
	public function getIdFilm(){
		return $this->idFilm;
	}

	/**
	 *
	 * @return string
	 */
	public function getNomFilm(){
		return $this->nomFilm;
	}

	/**
	 *
	 * @return int
	 */
	public function getAnnee(){
		return $this->annee;
	}

	/**
	 *
	 * @return int
	 */
	public function getScore(){
		return $this->score;
	}
}
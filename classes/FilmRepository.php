<?php
class FilmRepository extends Repository{

	/**
	 * Créer une instance FilmRepository
	 *
	 * @param PDO $datas Les attributs envoyé en paramètre lors de l'instanciation
	 */
	public function __construct($db){
		parent::__construct($db);
	}

	/**
	 * Ajoute un film à la base de donnée. 
	 * Appelle sa méthode "modify" pour modifier la donnée si le nom est déjà présent dans la base de données.
 	 *
	 * @param Film $film Nouveau film à ajouter à la base de données.
	 */
	public function add(Film $film){
		//Si l'un des attributs de $film est null, on envoie une erreur.
		if (is_null($film->getNomFilm()) or is_null($film->getAnnee()) or is_null($film->getScore())) throw new Exception('Erreur lors de l\'ajout du film. Un des champs est incorrect.<br/>');

		// On regarde si le nom du film à ajouté est déjà présent dans la base de données.
		$req = $this->db->prepare('SELECT COUNT(*) as nb FROM films WHERE lower(nom_film) = lower(:nom)');
			$req->execute(array('nom' => $film->getNomFilm()));
			$data = $req->fetch();
			$count = $data['nb'];
			
			if ($count == 0){
				$request = $this->db->prepare('INSERT INTO films (nom_film, annee_film, score) VALUES ( :nom, :annee , :score);');
				$request->execute(array('nom' => $film->getNomFilm(),
				                  'annee' => $film->getAnnee(),
				                  'score' => $film->getScore()));

				if ($request) echo '<p style="color: green;"> Le film a bien été ajouté</p>';
			} else {
				// Appelle de la méthode modify car le film est déjà présent en base.
				self::modify($film);
			}
	}

	/**
	 * Modifie un film à la base de donnée. 
 	 *
	 * @param Film $film Nouveau film à ajouter à la base de données.
	 */
	public function modify(Film $film){
		$request = $this->db->prepare('UPDATE films SET annee_film = :annee,  score = :score WHERE nom_film = :nom');
				$request->execute(array('nom' => $film->getNomFilm(),
				                  'annee' => $film->getAnnee(),
				                  'score' => $film->getScore()));
				echo '<p style="color: green;"> Le film a bien été modifié</p>';
	}

	/**
	 * Récupère une instance de film depuis la base de donnée en fonction d'un id demandé.
	 *
	 * @param int $id_film L'identifiant d'un film à rechercher.
	 *
	 * @return Film $film | null Retourne une instance de Film si l'id existe dans la base de donnée.
	 *		   					   Sinon, affiche une erreur et retourne null.
	 */
	public function getFilm($id_film){
		$req = $this->db->prepare('SELECT * FROM films
								  WHERE id_film = :id');
		$req->execute(array('id' => $id_film
				                  ));
		$data = $req->fetch();
		if($data) {	
			$film = new Film([
				'nomFilm' => $data['nom_film'],
				'annee' => $data['annee_film'],
				'score' => $data['score']
				]);
			return $film;
		} else {
			echo '<p class="fail"> Le film n\'existe pas';
			return;
			}
	}

	/**
	 * Récupère tous les films présent dans la base de données (ordonné par nom).
	 *
	 * @return Array (of Films) $arrayFilms Tableau des films de la base de données.
	 */
	public function getAllFilms(){
		$arrayFilms = array();
		$req = $this->db->prepare('SELECT * FROM films ORDER BY nom_film');
		$req->execute();
	    while ($data = $req->fetch()) {
	    	$film = new Film([
	    		'idFilm' => $data['id_film'],
				'nomFilm' => $data['nom_film'],
				'annee' => $data['annee_film'],
				'score' => $data['score']
				]);
	    	array_push($arrayFilms, $film);
	    }
	    return $arrayFilms;
	}


}
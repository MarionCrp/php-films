<?php
class CastingRepository extends Repository {

	/**
	 * Créer une instance CastingRepository
	 *
	 * @param PDO $datas Les attributs envoyé en paramètre lors de l'instanciation
	 */
	public function __construct($db){
		parent::__construct($db);
	}

	/**
	 * Ajoute un casting à la base de donnée. 
 	 *
	 * @param int $id_actor Id de l'acteur dont il faut affecter le film.
	 * @param int $id_film Id du film dont l'acteur doit être affecté.
	 */
	public function add($id_actor, $id_film){

		$film_rep = new FilmRepository($this->db);
		$actor_rep = new ActorRepository($this->db);

		// On vérifie que les deux id existent bien dans la base de données.
		$validation_film = $film_rep->getFilm($id_film);
		$validation_actor = $actor_rep->getActor($id_actor);
		if($validation_film == null or $validation_actor == null){
			if ($validation_actor == null) throw new Exception('Aucun acteur avec cet identifiant');
			else throw new Exception('Aucun film avec cet identifiant');
		}

		// On vérifie que l'affectation n'existe pas déjà dans la base de données.
		$req = $this->db->prepare('SELECT COUNT(*) as nb FROM casting 
														WHERE id_acteur = :id_acteur
														AND id_film = :id_film
														 ');
			$req->execute(array('id_acteur' => $id_actor,
							    'id_film' => $id_film));
			$data = $req->fetch();
			$count = $data['nb'];
			
			if ($count == 0){
				$request = $this->db->prepare('INSERT INTO casting (id_film, id_acteur) VALUES ( :id_film, :id_acteur);');
				$request->execute(array('id_film' => $id_film,
										'id_acteur' => $id_actor
										));

				if ($request) echo '<p style="color: green;"> Le casting a bien été ajouté</p>';
			} else {
				echo 'Ce casting a déjà été ajouté';
			}
	}

	public function getCasting($id_film){
		$arrayActors = array();
		$req = $this->db->prepare('SELECT * FROM acteurs a
							 INNER JOIN casting c 
							 ON a.id_acteur = c.id_acteur
							 INNER JOIN films f
							 ON f.id_film = c.id_film 
							 WHERE f.id_film = :id_film 
							 ORDER BY nom;');

		$req->execute(array('id_film' => $id_film));
		while ($data = $req->fetch()) {
	    	$actor = new Actor([
	    		'idActor' => $data['id_acteur'],
				'nom' => $data['nom'],
				'prenom' => $data['prenom']
				]);
	    	array_push($arrayActors, $actor);
	    }

	    return $arrayActors;
	}

	public function getFilms($id_actor){
		$arrayFilms = array();
		$req = $this->db->prepare('SELECT * FROM films f
							 INNER JOIN casting c 
							 ON f.id_film = c.id_film
							 INNER JOIN acteurs a
							 ON a.id_acteur = c.id_acteur
							 WHERE a.id_acteur = :id_acteur 
							 ORDER BY nom_film;');

		$req->execute(array('id_acteur' => $id_actor));
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
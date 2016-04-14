<?php

class ActorRepository extends Repository{

	/**
	 * Créer une instance ActorRepository
	 *
	 * @param PDO $datas Les attributs envoyé en paramètre lors de l'instanciation
	 */
	public function __construct(PDO $db){
		parent::__construct($db);
	}

	/**
	 * Ajoute un acteur à la base de donnée.
	 *
	 * @param Actor $actor Nouvel acteur à ajouter à la base de données.
	 */
	public function add(Actor $actor){
		//Si l'un des attributs d'$actor est null, on envoie une erreur.
		if (is_null($actor->getNom()) or is_null($actor->getPrenom()) ) throw new Exception('Erreur lors de l\'ajout de l\'acteur. Un des champs est incorrect.<br/>');

		// On vérifie que le "set" nom/prenom n'est pas déjà présent dans la table "Acteurs"
		$req = $this->db->prepare('SELECT COUNT(*) as nb 
								  	FROM acteurs 
								  	WHERE lower(nom) = lower(:nom)
								  	AND  lower(prenom) = lower(:prenom)');
			$req->execute(array('nom' => $actor->getNom(),
								'prenom' => $actor->getPrenom()
							));
			$data = $req->fetch();
			$count = $data['nb'];
			
			if ($count == 0){
				$request = $this->db->prepare('INSERT INTO acteurs (nom, prenom) VALUES ( :nom, :prenom);');
				$request->execute(array('nom' => $actor->getNom(),
				                  'prenom' => $actor->getPrenom()
				                  ));

				if ($request) echo '<p style="color: green;"> L\'acteur a bien été ajouté</p>';
			} else {
				echo 'L\'acteur a déjà été ajouté';
			}
	}

	/**
	 * Récupère une instance d'acteur depuis la base de donnée en fonction d'un id demandé.
	 *
	 * @param int $id_actor L'identifiant d'un acteur à rechercher.
	 *
	 * @return Actor $actor | null Retourne une instance d'Acteur si l'id existe dans la base de donnée.
	 *		   					   Sinon, affiche une erreur et retourne null.
	 */
	public function getActor($id_actor){
		$req = $this->db->prepare('SELECT * FROM acteurs
								  WHERE id_acteur = :id');
		$req->execute(array('id' => $id_actor
				                  ));
		$data = $req->fetch();
		if($data) {
			$actor = new Actor([
				'idActor' => $data['id_acteur'],
				'nom' => $data['nom'],
				'prenom' => $data['prenom']
				]);
			return $actor;
		} else {
			echo '<p class="fail"> L\'acteur n\'existe pas';
			return;
			}
	}

	/**
	 * Récupère tous les acteurs présent dans la base de données (ordonné par nom).
	 *
	 * @return Array (of Actors) $arrayActor Tableau des acteurs de la base de données.
	 */
	public function getAllActors(){
		$arrayActor = array();
		$req = $this->db->prepare('SELECT * FROM acteurs ORDER BY nom');
		$req->execute();
	    while ($data = $req->fetch()) {
	    	$actor = new Actor([
	    		'idActor' => $data['id_acteur'],
				'nom' => $data['nom'],
				'prenom' => $data['prenom']
				]);
	    	array_push($arrayActor, $actor);
	    }
	    return $arrayActor;
	}
}
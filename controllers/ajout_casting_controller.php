<?php
$title = 'Ajouter un Casting';
// On vérifie que les deux champs sont bien renseignés.
if(isset($_POST['envoie'])){
	if(isset($_POST['id_film']) && isset($_POST['id_acteur'])) {
		$casting_repository->add($_POST['id_acteur'], $_POST['id_film']);
	} else  {
		echo '<p style="color: red;"> Veuillez renseigner tous les champs </p>';
	} 
}

// Fonctions pour les champs sélections des acteurs et des films
function champ_acteurs(ActorRepository $actor_repository){
	$arrayActors = $actor_repository->getAllActors();
	foreach ($arrayActors as $actor)
	{
		echo '<option value="'.$actor->getIdActor().'"> '. $actor->getPrenom().' '. strtoupper($actor->getNom()).'</option>';
	}
}


function champ_films(FilmRepository $film_repository){
	$arrayFilms = $film_repository->getAllFilms();
	foreach ($arrayFilms as $film)
	{
		echo '<option value="'.$film->getIdFilm().'"> '. $film->getNomFilm().' ('. $film->getAnnee().')</option>';
	}
}
<?php
	$actor = $actor_repository->getActor($_GET['id_acteur']);
	$films = $casting_repository->getFilms($actor->getIdActor());
	$title = $actor->getPrenom(). ' ' .$actor->getNom();

/**
 * Affiche les acteurs ayant joué dans un film
 *
 * @param FilmRepository $film_repository  Permet la liaison à la base de donnée
 * @param array $films Une liste de film
 */
function displayFilms($film_repository, $films){
	$arrayFilm = $film_repository->getAllFilms();
	foreach($films as $film){
		 echo '<tr><td>'.$film->getNomFilm().'</td>'; 
		 echo '<td>'.$film->getAnnee().'</td>';
		 echo '<td>'.$film->getScore().'</td></tr>';
    }
}

?>
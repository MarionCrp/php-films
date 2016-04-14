<?php
//Instenciation des objets de type Repository pour gérer les différentes classes "Film/Acteur/Casting".
try {
	$film_repository = new FilmRepository($pdo);
	$actor_repository = new ActorRepository($pdo);
	$casting_repository = new CastingRepository($pdo);
} catch (Exception $e) {
	echo 'Erreur: '.$e->getMessage();
}

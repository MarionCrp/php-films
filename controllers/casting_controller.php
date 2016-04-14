<?php
$title = $film_repository->getFilm($_GET['id_film'])->getNomFilm();

/**
 * Affiche les acteurs ayant joué dans un film
 *
 * @param CastingRepository $casting_repository Permet la liaison à la base de donnée
 * @param int $id_film Le film dont on souhaite connaître le casting
 */
function displayCasting(CastingRepository $casting_repository, $id_film) {
	// On récupère la liste des acteurs ayant joué dans le film d'id $idfilm.
	$arrayCasting = $casting_repository->getCasting($id_film);

	//Si il n'y a pas d'entrée casting pour ce film, on affiche un message
	if (count($arrayCasting) == 0) 	echo '<h3 style=color:red;> Aucun acteur pour ce film</h3>';
	else { 
		?>
		<table class="table table-striped">
		<tr>
			<th>Prénom	Nom</th>
		</tr>
	<?php }
		foreach($arrayCasting as $actor){
			echo '<h3><tr><td><a href="index.php?page=acteur.php&id_acteur=' .$actor->getIdActor(). '">' .$actor->getPrenom(). ' '  .$actor->getNom(). '</a></td>
						</tr></h3>';
	}
	?> </table> <?php
}

			

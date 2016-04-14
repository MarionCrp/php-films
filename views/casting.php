<h1> Casting </h1>
<h2> 
	<?php 
		echo $film_repository->getFilm($_GET['id_film'])->getNomFilm();
	?>

</h2>

	
		<?php
			displayCasting($casting_repository, $_GET['id_film']);
		?>
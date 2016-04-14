<?php

	$title = 'Ajouter un Acteur';
	//On vérifie que les champs envoyé par le formulaire ne sont pas vides.
	if(isset($_POST['envoie'])){
		if(!empty($_POST['nom_acteur']) && !empty($_POST['prenom_acteur'])) {

			$actor = new Actor([
				'nom' => $_POST['nom_acteur'],
				'prenom' => $_POST['prenom_acteur'],
				]);
			
			try {
				$actor_repository->add($actor);
			} catch (Exception $e){
				echo $e->getMessage();
			}
		} else  {
			echo '<p style="color: red;"> Veuillez renseigner tous les champs </p>';
		} 

	}

	?>
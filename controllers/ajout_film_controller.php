<?php
$title = 'Ajouter un Film';
	//On vérifie que tous les champs du formulaire sont bien renseignés
	if(isset($_POST['envoie'])){
		if(!empty($_POST['nom_film']) && isset($_POST['annee_film']) && isset($_POST['score_film'])){

			$film = new Film([
				'nomFilm' => $_POST['nom_film'],
				'annee' => $_POST['annee_film'],
				'score' => $_POST['score_film']
				]);

			try {
				$film_repository->add($film);
			} catch (Exception $e){
				echo $e->getMessage();
			}
			
		} else  {
			echo '<p class="fail"> Veuillez renseigner tous les champs </p>';
		} 

	}

	// Fonctions pour les champs sélection des années et du score.
	function champ_annee(){
		for($annee=1900; $annee <= date('Y') + 2; $annee++) {
          			if ($annee == date('Y')) echo '<option value= "' .$annee. '" selected > ' .$annee. '</option>';
          			else echo '<option value=' .$annee. '> ' .$annee. '</option>';
          		}
	}

	function champ_score($deb, $fin){
		for($score=$deb; $score <= $fin; $score++) {
  			if ($score == round($fin/2) ) echo '<option value= "' .$score. '" selected > ' .$score. '</option>';
  			else echo '<option value=' .$score. '> ' .$score. '</option>';
  		}
	}
				

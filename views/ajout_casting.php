	<h1> Assigner un acteur à un film </h1>
      <form action="#" method="post">
      	<div class="form-group">
	        <label for="id_acteur"> Acteur </label>
	          <select name="id_acteur" class="form-control" id="id_acteur">
	         	 <?php 
	         	 		champ_acteurs($actor_repository); 
	         	 ?>
			 		  </select>
			 	</div>
			 	<div class="form-group">
			   	<label for="id_film"> Film </label>
		        <select name="id_film" class="form-control" id="id_film">
		        <?php
							champ_films($film_repository);
						?>
						</select>	
				</div>
         <button type="submit" class="btn btn-default" name="envoie">Ajouter le casting</button>
      </form>


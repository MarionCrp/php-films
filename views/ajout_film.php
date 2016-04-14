	<h1> Ajouter un film </h1>
      <form action="#" method="post">
       <div class="form-group">
          <label for="nom_film"> Titre </label>
            <input type="text" class="form-control" name="nom_film" id="nom_film">
        </div>
        <div class="form-group">
          <label for="annee_film"> Annee </label>
            <select class="form-control" name="annee_film" id="annee_film">
            	<?php
            		champ_annee(1900);
            	?>
            </select>
        </div>
        <div class="form-group">
          <label for="score_film"> Score </label>
            <select class="form-control" name="score_film" id="score_film">
            	<?php
            		champ_score(0,10);
            	?>
            </select>
        </div>
        <button type="submit" class="btn btn-default" name="envoie">Ajouter le film</button>
      </form>
  <h1> Liste des films </h1>
  
    <table class="table table-striped">
      <tr>
        <th> Nom du Film </th>
        <th> Année </th>
        <th> Score </th>
        <th> Acteurs </th>
      </tr>

        <?php
        	$arrayFilm = $film_repository->getAllFilms();
        	foreach ($arrayFilm as $film) {
        		 echo '<tr><td>'.$film->getNomFilm().'</td>'; /* printf('%04d', $data['nom_film'] */
        		 echo '<td>'.$film->getAnnee().'</td>';
        		 echo '<td>'.$film->getScore().'</td>';
        		 echo '<td><a href="?page=casting.php&id_film='.$film->getIdFilm().'"> Voir </a></td>
                  </tr>';
            }
        ?>

    </table>
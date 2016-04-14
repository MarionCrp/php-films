	
<h1> Filmographie </h1>
<h2> <?php echo $actor->getPrenom(). ' ' .$actor->getNom(); ?> </h2>';

<table class="table table-striped">
      <tr>
        <th> Nom du Film </th>
        <th> Année </th>
        <th> Score </th>
      </tr>

        <?php
        	displayFilms($film_repository, $films);
        ?>

    </table>
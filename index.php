<?php

require_once(__DIR__.'/autoload.php');

if(isset($_GET['page'])) {
  $page = $_GET['page']; 
  $controller_name = str_replace('.php', '_controller.php', $_GET['page']); 
  $controller = __DIR__.'/controllers/'.$controller_name;
  if (file_exists($controller))  include_once($controller);

} else {
  $page = 'afficher_films.php';
  $title = 'Liste des Films';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title> <?php echo $title; ?></title>
  </head>

  <body>
    <nav>
    <div class="banner">
      <h1> Mes Films </h1>
    </div>
    <ul class="nav nav-pills nav-justified">
      <li role="presentation" 
        <?php if (!isset($_GET['page'])) echo 'class="active"'; ?> > 
          <a href="index.php"> 
          Afficher la liste des films<span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> </a>
      </li> 
      <li role="presentation" 
        <?php if (isset($_GET['page']) AND $_GET['page'] == "ajout_film.php") echo 'class="active"'; ?>> 
          <a href="?page=ajout_film.php">
             Ajouter un Film <span class="glyphicon glyphicon glyphicon-eject" aria-hidden="true"></span></a>
            
      </li>
      <li role="presentation" 
        <?php if (isset($_GET['page']) AND $_GET['page'] == "ajout_acteur.php") echo 'class="active"'; ?>>
          <a href="?page=ajout_acteur.php">
           Ajouter un Acteur <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
      </li>
      <li role="presentation" 
        <?php if (isset($_GET['page']) AND $_GET['page'] == "ajout_casting.php") echo 'class="active"'; ?>>
          <a href="?page=ajout_casting.php"> 
          Ajouter un Casting <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span></a>
      </li>
    </ul>
    </nav>
    <hr>

      <?php

      include_once(__DIR__.'/views/'.$page);

      ?>
    </body>
    <footer>
      <hr>
      <small> by Marion Craipeau</small>
    </footer>
</html>

 <?php
 //Instenciation de l'objet $pdo qui va permettre la connexion à la base de donnée. 
 	try {
      $pdo = new PDO('mysql:host=localhost;dbname=films;charset=utf8','root','');
       return $pdo;
      }
      catch (Exception $e) 
      {
       echo 'Erreur: '.$e->getMessage();
      }

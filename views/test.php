<?php

var_dump($actor_repository->getActor(100));

var_dump($request = $pdo->prepare('UPDATE films SET annee_film = 2000,  score = 5 WHERE nom_film = "grtgthiterh"'));

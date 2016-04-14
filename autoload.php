<?php

/*******************************************
* AUTOLOAD, et création d'instances de travail
********************************************/

/**
* Chargement des classes
**/ 
spl_autoload_register(function($classname)
{
    // on suppose classe dans son propre fichier portant le même nom
    // class Animal => Animal.php
    $file = __DIR__.'/classes/'.$classname.'.php';
/*    $page = ['*-^.php'];
    echo $page;
    $controller = __DIR__.'/controllers/'.$_GET['page'].'_controller.php';*/
    // echo 'classe '.$classname.' inconnue -> chargement de '.$file."\n";
    require_once($file);
});

/**
* Connexion base de données
**/ 
require_once(__DIR__.'/controllers/db_connexion.php');

/**
* Création de différentes instances de travail
**/
require_once(__DIR__.'/controllers/object_manager.php');
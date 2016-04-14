<?php

/**
 * La classe abstraite Repository pour faire le lien entre les objets et la base de données.
 * Elle impose l'utilisation d'une base de donnée en attribut. 
 */
abstract class Repository {
	protected $db;

	/**
	 * Créer une instance de type Repository
	 *
	 * @param PDO $db La base de donnée
	 */
	public function __construct(PDO $db){
		$this-> setDb($db);
	}

	/**
	 * Créer une instance Film
	 *
	 * @param PDO $db assigne la base de donnée en attribut à un répertoire.
	 */
	public function setDb(PDO $db){
		$this->db = $db;
	}
}

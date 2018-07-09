<?php

class Manager {
	private $db;


	public function __construct(PDO $db) {
		$this->setDB($db);
	}

	public function setDB(PDO $db){
		$this->db = $db;
	}

}



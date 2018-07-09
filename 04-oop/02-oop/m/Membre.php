<?php

require_once 'TModelUtils.php';

class Membre extends TModelUtils {
	// use TModelUtils;

	// attributes
	private $mbNum;
	private $mbNom;
	private $mbPrenom;
	private $mbDtNaiss;
	private $mbSpId;

	public function __construct(array $data){
		$this->hydrate($data);
	}



	//==========  - GETTERS & SETTERS -  ==========//
	
	public function mbNum() {
		return $this->mbNum;
	}

	public function mbNom() {
		return $this->mbNom;
	}

	public function mbPrenom() {
		return $this->mbPrenom;
	}


	public function mbDtNaiss() {
		return $this->mbDtNaiss;
	}

	public function mbSpId() {
		return $this->mbSpId;
	}

//

	public function setMbNum(int $num) {
			$this->mbNum = $num;
	}

	public function setMbNom(string $nom) {
			$this->mbNom = $nom;
	}

	public function setMbPrenom(string $prenom) {
			$this->mbPrenom = $prenom;
	}

	public function setMbDtNaiss(string $dtNaiss) {
			$this->mbDtNaiss = $dtNaiss;
	}

	public function setMbSpId(int $spId) {
			$this->mbSpId = $spId;
	}



}
<?php
namespace App\Model;

class Utilisateur {

	protected $fName;
	protected $lName;
	protected $phone;

	public function __construct(string $fName, string $lName, string $phone) {
		$this->setFName($fName);
		$this->setLName($lName);
		$this->setPhone($phone);
	}

	/**
	 * Get the value of fName
	 */ 
	public function getFName() :string {
		return $this->fName;
	}

	/**
	 * Set the value of fName
	 *
	 * @return string
	 */ 
	public function setFName(string $fName) {
		$this->fName = $fName;
	}

	/**
	 * Get the value of phone
	 */ 
	public function getPhone() :string {
		return $this->phone;
	}

	/**
	 * Set the value of phone
	 *
	 * @return string
	 */ 
	public function setPhone(string $phone) {
		$this->phone = $phone;
	}
	

	/**
	 * Get the value of lName
	 */ 
	public function getLName() :string {
		return $this->lName;
	}

	/**
	 * Set the value of lName
	 *
	 * @return string
	 */ 
	public function setLName(string $lName)
	{
		$this->lName = $lName;
	}
}




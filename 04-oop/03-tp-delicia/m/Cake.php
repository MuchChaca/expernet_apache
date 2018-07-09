<?php

class Cake {
	// attributes
	protected $id;
	protected $label;
	protected $shortDescription;
	protected $price;

	public function __construct() {
		// TODO
	}

	//==========  - GETTERS & SETTERS -  ==========//

	public function id() {
		return $this->id;
	}

	public function label() {
		return $this->label;
	}

	public function shortDescription() {
		return $this->shortDescription;
	}

	public function price() {
		return $this->price;
	}


	public function setId($id) {
		$this->id = $id;
	}

	public function setLabel($label) {
		$this->label = $label;
	}

	public function setShortDescription($sdecp) {
		$this->shortDescription = $sdecp;
	}

	public function setPrice($price) {
		$this->price = $price;
	}

}
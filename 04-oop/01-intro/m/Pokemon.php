<?php


class Pokemon{

	// attributes - caracterise an object
	private $_name;
	private $_hp;
	private $_type;
	private $_lvl;

	public function __construct($name = null, $hp = 100, $type = null, $lvl = 1) {
		$this->_name = $name;
		$this->_hp = $hp;
		$this->_type = $type;
		$this->_lvl = $lvl;
	}

	public function attack() {
		echo "<h2>Attack !</h2>";
	}


	/**
	 * levelUp add levels to the Pokemon
	 * @param int default = 1; number of levels to add
	 * @return void
	 */
	public function levelUp($nbLvl = 1) {
		$this->setLvl($this->lvl() + $nbLvl);
	}


	//===========  - GETTERS & SETTERS -  ===========//

	public function name(): string {
		return $this->_name;
	}

	public function hp(): string {
		return $this->_hp;
	}

	public function type(): string {
		return $this->_type;
	}

	public function lvl(): int {
		return $this->_lvl;
	}

	public function setName(string $name) {
		// string only
		if(is_string($name)){
			$this->_name = $name;
		} else {
			throw new InvalidArgumentException('Expecting parameter to be string.');
		}
	}

	public function setHp(string $hp) {
		// string only
		if(is_string($hp)){
			$this->_hp = $hp;
		} else {
			throw new InvalidArgumentException('Expecting parameter to be string.');
		}
	}

	public function setType(string $type) {
		// string only
		if(is_string($type)){
			$this->_type = $type;
		} else {
			throw new InvalidArgumentException('Expecting parameter to be string.');
		}
	}

	public function setLvl(int $lvl) {
		// int only
		if(is_int($lvl)){
			$this->_lvl = $lvl;
		} else {
			throw new InvalidArgumentException('Expecting parameter to be int.');
		}
	}

}




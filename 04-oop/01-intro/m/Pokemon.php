<?php


class Pokemon{

	// attributes - caracterise an object
	private $_name;
	private $_hp;
	private $_type;
	private $_lvl;

	// constants
	const HP_NORMAL	= 100;
	const HP_RARE		= 180;

	public function __construct($name = "", $hp = Pokemon::HP_NORMAL, $type = "", $lvl = 1) {
		$this->setName($name);
		$this->initHp($hp);
		$this->setType($type);
		$this->setLvl($lvl);
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

	/**
	 * initHp initialize the HP of the Pokemon
	 * @param int HP must be a valid const: [Pokemon::HP_NORMAL, Pokemon::HP_RARE]
	 * @return void
	 */
	public function initHp(int $hp) {
		// check if the hp is one of the valid const
		if(in_array($hp, [self::HP_NORMAL, self::HP_RARE])){
			$this->setHp($hp);
		}
	}

	//===========  - GETTERS & SETTERS -  ===========//

	public function name(): string {
		return $this->_name;
	}

	public function hp(): int {
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

	public function setHp(int $hp) {
		// string only
		if(is_int($hp)){
			$this->_hp = $hp;
		} else {
			throw new InvalidArgumentException('Expecting parameter to be int.');
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




<?php
class TModelUtils {
	public function hydrate(array $data) {
		foreach($data as $k => $v) {
			$method = "set".ucfirst($k);
	
			if(method_exists($this, $method)) {
				$this->$method($v);
			}
		}
	}


	// public function getAttr(string $name) {
	// 	$method = $name;

	// 	if(method_exists($this, $method)){
	// 		return $this->$method();
	// 	}
	// }

	// public function setAttr(string $name, $value) {
	// 	$method = "set" . ucfirst($name);

	// 	if(method_exists($this, $method)){
	// 		$this->$method($value);
	// 	}
	// }
}
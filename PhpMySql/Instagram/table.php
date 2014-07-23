<?php
require_once("iDbConnectable.php");

class Table implements iDbConnectable {

	private $_database;
	private $_template;
	private $_attributes;

	public function __construct($attributes = array()) {
		
		// Check attributes validity
		if (get_class($attributes[0]) != 'PDO') {
			throw new Exception('Wrong parameters');
		}
		if (get_class($attributes[1]) != 'Template') {
			throw new Exception('Wrong parameters');
		}
		// if (is_array($attributes[2]) == false) {
		// 	throw new Exception('Wrong parameters');
		// }

		// Assign
		$this->_database = $attributes[0];
		$this->_template = $attributes[1];

		if (isset($attributes[2])) {
			if (is_array($attributes[2]) == true) {
				$params = $attributes[1]->getParams();
				foreach(array_keys($attributes[2]) as $key) {
					if (array_search($key, $params) == FALSE) {
						throw new Exception('Wrong parameters');		
					}
				}
				$this->_attributes = $attributes[2];
			}
		}
		else {
			$this->_attributes = array();
		}
	}

	// Find withot assign
	private function _findPk($pk) {
		
		// Check is primaryKey exists
		$key = $this->_template->getPrimaryKey();
		if ($key == null) {
			return null;
		}

		// Get data
		$get = $this->_template->getGetQuery();
		$get->execute(array(':'.$key => $pk));
		$result = $get->fetch(PDO::FETCH_ASSOC);
		if ($result == false) {
			return null;
		}

		return $result;
	}

	public function findByPk($pk) {
		
		$result = $this->_findPk($pk);

		if ($result == null) {
			return null;
		}

		// Assign
		$params = $this->_template->getParams();
		foreach($params as $key) {
			$this->_attributes[$key] = $result[$key]; 
		}
		return $this;
	}

	public function save() {

		// Prepare parameters
		$args = array();
		foreach($this->_template->getParams() as $key) {
			$args[':'.$key] = $this->_attributes[$key];
		} 

		// Get primary key
		$primaryKey = $this->_template->getPrimaryKey();
		if ($primaryKey == null) {
			echo 'no primary key'.PHP_EOL;
			$this->_insert($args);
			return $this;
		}
		
		// Get primary key value
		$pkVal = $this->_attributes[$primaryKey];
		if ($this->_findPk($pkVal) == null) {
			echo 'no such key'.PHP_EOL;
			$this->_insert($args);
			return $this;
		}

		$this->_update($args);
		return $this;
	}

	private function _insert($args) {

		$insert = $this->_template->getInsertQuery();
		$insert->execute($args);
	}

	private function _update($args) {
		
		$update = $this->_template->getUpdateQuery();
		$update->execute($args);
	}

	public function where($attribute, $value) {

		
	}

	public function setParameter($parameter, $value) {
		$this->_attributes[$parameter] = $value;
	}

}
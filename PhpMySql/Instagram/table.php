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
		if (is_array($attributes[2]) == false) {
			throw new Exception('Wrong parameters');
		}
		$params = $attributes[1]->getParams();
		foreach(array_keys($attributes[2]) as $key) {
			if (array_search($key, $params) == FALSE) {
				throw new Exception('Wrong parameters');		
			}
		}

		// Assign
		$this->_database = $attributes[0];
		$this->_template = $attributes[1];
		$this->_attributes = $attributes[2];
	}

	public function findByPk($pk) {
		
		// Check is primaryKey exists
		$key = $this->_template->getPrimaryKey();
		if ($key == null) {
			return null;
		}

		// Get data
		$get = $this->_template->getGetQuery();
		$get->execute(array(':'.$key => $pk));
		$result = $get->fetch(PDO::FETCH_ASSOC);

		// Assign
		$params = $this->_template->getParams();
		foreach($params as $key) {
			$this->_attributes[$key] = $result[$key]; 
		}
		return $this;
	}

	public function save() {
		
	}

	public function where($attribute, $value) {

	}

}
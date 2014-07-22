<?php
require_once("iDbConnectable.php");

class Table implements iDbConnectable {

	private $_database;
	private $_template;
	private $_attributes;

	public function __construct($attributes = array()) {
		if (get_class($attributes[0]) != 'PDO') {
			throw new Exception('Wrong parameters');
		}
		if (get_class($attributes[1]) != 'Template') {
			throw new Exception('Wrong parameters');
		}
	}

	public function findByPk($pk) {

	}

	public function save() {

	}

	public function where($attribute, $value) {

	}

}
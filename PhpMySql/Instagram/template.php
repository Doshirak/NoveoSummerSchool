<?php

class Template {

	private $_tableName;
	private $_privateKey;
	private $_params;

	public function __construct($tableName, $privateKey, array $params) {
		$this->_tableName = $tableName;
		$this->_privateKey = $privateKey;
		$this->_params = $params;
	}

} 
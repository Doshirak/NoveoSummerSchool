<?php

class Template {

	private $_tableName;
	private $_primaryKey;
	private $_params;

	private $_get;
	private $_insert;
	private $_update;

	public function __construct($database, $tableName, $privateKey, array $params) {
		$this->_tableName = $tableName;
		$this->_primaryKey = $privateKey;
		$this->_params = $params;
		$this->setQueries($database);
	}

	private function setQueries($database) {
		
		// Prepare get query
		if ($this->_primaryKey != null) {
			$sql = 'SELECT * FROM '.$this->_tableName.' WHERE '.$this->_primaryKey.'=:'.$this->_primaryKey;
			$this->_get = $database->prepare($sql);
		}

		// Prepare insert query
		$n = count($this->_params);
		$sql = 'INSERT INTO '.$this->_tableName.' (';
		for ($i = 0;$i < $n - 1;++$i) {
			$sql .= $this->_params[$i].' ,';
		}
		$sql .= $this->_params[$n - 1].') VALUES (';
		for ($i = 0;$i < $n - 1;++$i) {
			$sql .= ':'.$this->_params[$i].' ,';
		}
		$sql .= ':'.$this->_params[$n - 1].')';
		$this->_insert = $database->prepare($sql);

		// Prepare update query
		if ($this->_primaryKey != null) {
			// Parameters without primary key
			$params = array();
			foreach($this->_params as $key) {
				if ($key != $this->_primaryKey)	
					array_push($params, $key);
			}
			$n = count($params);

			$sql = 'UPDATE '.$this->_tableName.' SET ';
			for ($i = 0;$i < $n - 1;++$i) {
				$sql .= $params[$i].'=:'.$params[$i].', ';
			}
			$sql .= $params[$n - 1].'=:'.$params[$n - 1].' WHERE '.$this->_primaryKey.'=:'.$this->_primaryKey;
		}
		$this->_update = $database->prepare($sql);
	}

	public function getParams() {
		return $this->_params;	
	}

	public function getPrimaryKey() {
		return $this->_primaryKey;
	}

	public function getGetQuery() {
		return $this->_get;
	}
} 
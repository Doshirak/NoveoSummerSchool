<?php
require_once("template.php");

// Load tables from database and create table templeates to them
class Loader {

	private $_database;
	// Array of tables templates
	private $_templates;

	public function __construct($host, $dbName, $user, $password) {
		
		// Connect
		try {
    		$this->_database = new PDO('mysql:host='.$host.';dbname='.$dbName, $user, $password);
		} catch (Exception $e) {
		    echo $e->getMessage().PHP_EOL;
		}

    	// Load tables names
    	$this->_templates = array();
    	$query = $this->_database->query('SHOW TABLES');
    	$result = $query->fetchAll(PDO::FETCH_NUM);
    	foreach($result as $value) {
    		// Create tables
			$this->createTemplate($value[0]);
		}
	}

	private function createTemplate($tableName) {

		// Templates values
		$primaryKey;
		$param = array();

		// Get parameters
	    $query = $this->_database->query('DESCRIBE `'.$tableName.'`');
	    $result = $query->fetchAll(PDO::FETCH_ASSOC);
	    foreach($result as $value) {
	    	array_push($param, $value['Field']);
		}

		// Get primary key
		$query = $this->_database->query('SHOW KEYS FROM `'.$tableName.'` WHERE Key_name = \'PRIMARY\'');
	    $result = $query->fetch(PDO::FETCH_ASSOC);
	    $primaryKey = $result['Column_name'];

	    $template = new Template($tableName, $primaryKey, $param);
	    $this->_templates[$tableName] = $template;
	}

	public function getTemplate($tableName) {
		return $this->_templates[$tableName];
	}

	public function getDB() {
		return $this->_database;
	}
}


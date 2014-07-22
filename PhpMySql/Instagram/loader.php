<?php
require_once("iDbConnectable.php");

// Load tables from database and create interfases to them
class Loader {

	private $_database;
	// Array of table interfaces
	private $_tables;

	public function __construct($host, $dbName, $user, $password){
		
		// Connect
		try {
    		$this->_database = new PDO('mysql:host='.$host.';dbname='.$dbName, $user, $password);
		} catch (Exception $e) {
		    echo $e->getMessage().PHP_EOL;
		}

    	// Load tables
    	$this->_tables = array();
    	$query = $this->_database->query('SHOW TABLES');
    	$result = $query->fetchAll(PDO::FETCH_NUM);
    	foreach($result as $value) {
			$this->createTable($value[0]);
		}
	}

	private function createTable($tableName){

		// Table values
		$primaryKey;
		$paramNum;
		$param = array();

		// echo $tableName.PHP_EOL.'---'.PHP_EOL;	

		// Get parameters
	    $query = $this->_database->query('DESCRIBE `'.$tableName.'`');
	    $result = $query->fetchAll(PDO::FETCH_ASSOC);
	    foreach($result as $value) {
	    	array_push($param, $value['Field']);
			// echo $value[0].PHP_EOL;		
		}
		// var_dump($param);

		// Get primary key
		$query = $this->_database->query('SHOW KEYS FROM `'.$tableName.'` WHERE Key_name = \'PRIMARY\'');
	    $result = $query->fetch(PDO::FETCH_ASSOC);
	    // var_dump($result['Column_name']);
	    $primaryKey = $result['Column_name'];



		// echo PHP_EOL.PHP_EOL;
	}

}


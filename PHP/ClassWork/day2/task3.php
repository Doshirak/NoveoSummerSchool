<?php

require_once('task2.php');

class SingleStorage extends ExceptionStorage  
{
	private static $instance = null;
	private  function __construct(){}

	function getInstance()
	{
		if(self::$instance == null)
		{
			echo 'creating SingleStorage...', PHP_EOL;
			self::$instance = new ExceptionStorage();
		}
		return self::$instance;
	}
}

echo 'SingleStorage test...', PHP_EOL;

// Create object
$storage = SingleStorage::getInstance();	

test($storage);

$storage = SingleStorage::getInstance();

test($storage);

echo PHP_EOL;
?>
<?php

require_once('task1.php');

class ExceptionStorage extends Storage
{
	function getObject($key)
	{
		if(!array_key_exists($key, $this->storage))
		{
			throw new Exception('Element doesn`t exists');
		}
		return $this->storage[$key];
	}
}

echo 'ExceptionStorage test...', PHP_EOL;

// Create object
$storage = new ExceptionStorage();

test($storage);

// Get item, that doesn't exists
try 
{
	echo $storage->getObject(1), PHP_EOL;
}catch(Exception $e)
{
	echo $e->getMessage(), PHP_EOL;
}

echo PHP_EOL;
?>
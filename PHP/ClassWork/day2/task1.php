<?php

require_once('iStorage.php');

class Storage implements iStorage
{
	function storeObject($key, $object)
	{
		$this->storage[$key] = $object;
	}

	function removeObject($key)
	{
		unset($this->storage[$key]);
	}

	function getObject($key)
	{
		return $this->storage[$key];
	}

	protected $storage = array();
}

function test(iStorage &$storage)
{
	// Store item
	$storage->storeObject(1,'apple');

	// Get item
	echo $storage->getObject(1), PHP_EOL;

	// Remove item
	$storage->removeObject(1);
}

echo 'Storage test...', PHP_EOL;

// Create object
$storage = new Storage();

test($storage);

echo PHP_EOL;
?>
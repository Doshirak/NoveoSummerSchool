<?php

interface iStorage
{
	function storeObject($key, $object);
	function removeObject($key);
	function getObject($key);
}

?>
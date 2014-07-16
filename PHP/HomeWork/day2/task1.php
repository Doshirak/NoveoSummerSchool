<?php

class A
{
	function __construct()
	{
		echo 'я создан', PHP_EOL;
	}

	function __clone()
	{
		echo 'я клонирован', PHP_EOL;
	}

	function __get($name)
	{
		echo 'у меня запросили ', $name, PHP_EOL;
	}

	function __call($name, $arguments)
	{
		echo 'у меня вызвали ', $name, PHP_EOL;
	}

	function __toString()
	{
		$name = get_class($this);
		echo 'название класса ', $name, PHP_EOL;
		return $name;
	}
}

$obj = new A();
$copy = clone $obj;
$obj->var;
$obj->foo();
(string)$obj;

?>
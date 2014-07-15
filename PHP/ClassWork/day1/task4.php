<?php

function foo($param_1, $param_2)
{
	// fucntion work
	var_dump($param_1);
	var_dump($param_2);

	// debug script
	$format = "Current line: %d\n";
	$format = $format . "Current file: %s\n";
	$format = $format . "Current function: %s\n";
	printf($format,__LINE__,__FILE__,__FUNCTION__);
	$args = func_get_args();
	$string = implode(', ', $args);
	printf("Function arguments: %s\n",$string);
}

foo(1,2);
?>
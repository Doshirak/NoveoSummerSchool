<?php
require_once('getData.php');
$string = "";
$i = 1;
for ($users as $val)
{
	$string = $string."$i.".$val."\n";
	++$i;
}
?>
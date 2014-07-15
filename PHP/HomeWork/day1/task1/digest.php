<?php
require_once('getData.php');
//converting array into string 
$string = '';
$i = 1;
foreach($users as $user)
{
	$string = $string.$i.".".$user."\n";
	++$i;
}
?>
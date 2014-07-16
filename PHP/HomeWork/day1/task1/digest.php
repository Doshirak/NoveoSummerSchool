<?php
require_once('getData.php');
//converting array into string 
$string = '';
$i = 1;
foreach($users as $user)
{
	$string = $string.$i.".".$user."\n";
>>>>>>> b51adfe32b6d4f6effc4b65a69d8839e476525fc
	++$i;
}
?>
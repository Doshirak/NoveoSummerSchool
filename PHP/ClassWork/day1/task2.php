<?php
$id = 123;
while (strlen($id) < 6)
{
	$id = "0" . $id;
}
echo ($id."\n");
?>
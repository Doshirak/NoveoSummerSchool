<?php
$id = 22;
while (strlen($id) < 6)
{
	$id = "0" . $id;
}
echo ($id."\n");
?>
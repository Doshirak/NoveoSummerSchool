<?php
$ids = array(1, 2, 3, 4);
$string = implode(', ', $ids);
$sql = 'SELECT * FROM `table` WHERE `id` IN ('.$string.')';
echo("$sql"."\n");
?>
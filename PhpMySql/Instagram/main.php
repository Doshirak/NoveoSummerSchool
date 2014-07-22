<?php
require_once('loader.php');
require_once('table.php');

$loader = new Loader('localhost', 'instagram', 'root', '123456');
$database = $loader->getDB();
$template = $loader->getTemplate('users');
$table = new Table(array($database, $template));
<?php
require_once('loader.php');
require_once('table.php');

$loader = new Loader('localhost', 'instagram', 'root', 'combine6573');
$database = $loader->getDB();
$userTemplate = $loader->getTemplate('users');
$userTable = new Table(array($database, $userTemplate, array(
	'firstName' => 'Name', 'lastName' => 'LastName',
	'login' => 'Login', 'password' => 'Pswd')));
$userTable->findByPk(1);
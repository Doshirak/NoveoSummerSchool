<?php
require_once('loader.php');
require_once('table.php');

$loader = new Loader('localhost', 'instagram', 'root', '123456');
$database = $loader->getDB();
$userTemplate = $loader->getTemplate('users');
$userTable = new Table(array($database, $userTemplate));
$userTable->findByPk(1);
// $userTable->setParameter('password','456');
$userTable->save();
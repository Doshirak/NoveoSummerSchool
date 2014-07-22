<?php

require_once('base.php');
$user='root';
$pass='123456';
$dbh;

try {
    $dbh = new PDO('mysql:host=localhost;dbname=instagram', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$table = new UserRow($dbh, array("userName", "123")); 
$table->findByPk(2);
$table->setLogin('Petya');
$table->save();

$dbh = null;


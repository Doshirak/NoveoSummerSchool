<?php
require_once('base.php');
$user='root';
$pass='123456';
$dbh;
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$A = new Base($dbh, null); 
$A->findByPk(1);


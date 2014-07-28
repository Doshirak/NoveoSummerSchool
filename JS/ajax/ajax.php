<?php

var_dump($_REQUEST);
$lastName = $_REQUEST["lastName"];
$firstName = $_REQUEST["firstName"];
$patronymic = $_REQUEST["patronymic"];
$username = $_REQUEST["username"];
$textArea = $_REQUEST["textArea"];
$age = $_REQUEST["age"];

$str = "Здравствуйте, ".$lastName." ".$firstName." ".$patronymic.PHP_EOL;
$str .= "Ваш логин ".$username.PHP_EOL;
$str .= "Ваш возраст ".$age.PHP_EOL;

echo $str;

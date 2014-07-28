<?php

$lastName = $_REQUEST["lastName"];
$firstName = $_REQUEST["firstName"];
$patronymic = $_REQUEST["patronymic"];
$username = $_REQUEST["username"];
$sex = $_REQUEST["sex"];
$city = $_REQUEST["city"];
$textArea = $_REQUEST["textArea"];
$age = $_REQUEST["age"];

$str = "Здравствуйте, ".$lastName." ".$firstName." ".$patronymic.PHP_EOL;
$str .= "Ваш пол ".$sex.PHP_EOL;
$str .= "Ваш возраст ".$age.PHP_EOL;
$str .= "Ваш город ".$city.PHP_EOL;
$str .= "Ваша заметка о себе :".$textArea.PHP_EOL;
$str .= "Ваш логин ".$username.PHP_EOL;

echo $str;

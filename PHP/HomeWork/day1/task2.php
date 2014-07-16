<?php

function cmp(array &$a,array &$b)
{
	$c = $a['rank'];
	$d = $b['rank'];
    if ($c == $d) {
        return 0;
    }
    return ($c < $d) ? 1 : -1;
}

$array = array(
	array(
		'name' => 'Вася Пупкин',
		'rank' => 5
		),
	array(
		'name' => 'Сергей Иванов',
		'rank' => 3
		),
	array(
		'name' => 'Петя Каменьщик',
		'rank' => 4
		)
	);

var_dump($array);

usort($array,"cmp");

var_dump($array);
?>
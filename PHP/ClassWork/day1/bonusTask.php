<?php

$month = date('F');
$daysNumber = date('t');
$currDay = 1;

echo($month."\n");
while ($currDay < $daysNumber)
{
	printf('%2d ',$currDay);
	if (($currDay % 7) == 0){
		echo("\n");
	}
	++$currDay;
}
echo("\n");


?>
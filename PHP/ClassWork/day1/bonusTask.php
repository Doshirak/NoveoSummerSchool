<?php

$month = date('F');
$daysNumber = date('t');
$currDay = 1;
$currDayInWeek = date('w',strtotime("Sunday + $currDay Days")) + 1;

// Month
echo($month."\n");

// Week days
for ($i = 0;$i < 7;++$i)
{
	echo(date('D',strtotime("Monday + $i Days")).' ');
}
echo("\n");

// Numbers of days
for ($i = 0;$i < $currDayInWeek - 1;++$i)
{
	echo("    ");
}
while ($currDay < $daysNumber)
{
	printf('%3d ',$currDay);
	if (($currDayInWeek % 7) == 0){
		$currDayInWeek = 0;
		echo("\n");
	}
	++$currDay;
	++$currDayInWeek;
}
echo("\n");


?>
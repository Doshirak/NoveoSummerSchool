<?php

$month = date('F');
$daysNumber = date('t');
$currDay = 1;

echo($month."\n");
for ($i = 0;$i < 7;++$i)
{
	echo(date('D',strtotime("Sunday + $i Days")).' ');
}
echo("\n");
while ($currDay < $daysNumber)
{
	printf('%3d ',$currDay);
	if (($currDay % 7) == 0){
		echo("\n");
	}
	++$currDay;
}
echo("\n");


?>
<?php
$file = fopen('categories.csv','r');
$array = array();
$i = 0;
while (($temp = fgetcsv($file,1000,";")) !== FALSE)
{
	array_push($array, $temp);
	
	// count of parents	
	$depth = 0;
	$parent = $array[$i][1];
	if($parent !== "")
	{
		$parent -= 1;
		// parant depth + 1 
		$depth = $array[$parent][3] + 1;
	}
	$array[$i][3] = $depth;

	for ($j = 0;$j < $depth;++$j)
		echo(" ");

	echo($array[$i][2]."\n");
	++$i;
}
fclose($file);
?>
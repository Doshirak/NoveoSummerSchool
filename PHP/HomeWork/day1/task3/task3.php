<?php
$file = fopen('categories.csv','r');
$array = array();
$n = 0;

while (($temp = fgetcsv($file,1000,";")) !== FALSE)
{
	$id = $temp[0];
	if(!is_numeric($id))
		continue;
	$temp[3] = 0;
	$array[$id] = $temp;
	++$n;
}

foreach($array as &$temp)
{
	// count of parents	
	$depth = 0;
	$parent = $temp[1];
	if($parent !== "")
	{
		// parant depth + 1 
		// echo $array[$parent][3], PHP_EOL;
		$depth = $array[$parent][3] + 1;
	}
	$temp[3] = $depth;
	for ($j = 0;$j < $depth;++$j)
		echo(" ");

	echo($temp[2]."\n");

}

fclose($file);
?>
<?php
define("ID", 0);
define("PARENT_ID", 1);
define("VALUE", 2);
define("DEPTH", 3);

$file = fopen('categories.csv','r');
$array = array();
$i = 0;

while (($temp = fgetcsv($file,1000,";")) !== FALSE)
{
	$id = $temp[ID];

	if (!is_numeric($id))
		continue;

	$temp[DEPTH] = 0;
	$array[$id] = $temp;	
}

usort($array, function(array $a,array $b)
{
	if ($a[PARENT_ID] == $b[PARENT_ID])
		return 0;
	if ($a[PARENT_ID] > $b[PARENT_ID])
		return 1;
	else
		return -1;
});


// function bulidTree(array $array, array $temp)
// {
// 	$depth = 0;
// 	$parent = $temp[PARENT_ID];
// 	if($parent == "")
// 	{
// 		// parant depth + 1 
// 		$depth = $array[$parent][DEPTH] + 1;
// 	}
// 	else
// 	{
		
// 	}
// 	$temp[DEPTH] = $depth;

// }

foreach($array as &$temp)
{
	$depth = 0;
	$parent = $temp[PARENT_ID];
	if($parent !== "")
	{
		// parant depth + 1 
		$depth = $array[$parent][DEPTH] + 1;
	}
	$temp[DEPTH] = $depth;

	// for ($j = 0;$j < $depth;++$j)
		// echo(" ");

	// echo($temp[VALUE]."\n");
}

fclose($file);

<?php
require '../common/CsvFileIterator.php';

$data = new CsvFileIterator('guitar_list.csv');

foreach ($data as $key => $value)
{
	
	$name = str_replace(' ','',$value[0]);
	$score = str_replace(' ','',$value[1]);
	
	if(!empty($name) && !empty($score))
	{
		$dbc = mysqli_connect('localhost', 'root', 'ckh1142', 'guitarwarsdb')
			or die('Connection Fail');
		
		$query = "insert into guitarwars (date, name, score)" .
				"values (Now(), '$name', $score)";
		
		mysqli_query($dbc, $query)
			or die('Query Fail');
			
		$id = mysqli_insert_id($dbc);

		echo "id : $id / name : $name / score : $score <br/>";
		mysqli_close($dbc);
	}
}
?>
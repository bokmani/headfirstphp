<?php
require_once 'CsvFileIterator.php';

$data = new CsvFileIterator('email_list.csv');

foreach ($data as $key => $value)
{
	echo $key;
	
	echo $value[0];
	echo '<br/>';
}
?>
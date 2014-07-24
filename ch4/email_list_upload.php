<?php
require_once 'CsvFileIterator.php';

$data = new CsvFileIterator('email_list.csv');

foreach ($data as $key => $value)
{
	
	$first_name = str_replace(' ','',$value[0]);
	$last_name = str_replace(' ','',$value[1]);
	$email = str_replace(' ','',$value[2]);
	
	if(!empty($first_name) && !empty($last_name) && !empty($email))
	{
		$dbc = mysqli_connect('localhost', 'root', 'ckh1142', 'elvis_store')
			or die('Connection Fail');
		
		$query = "insert into email_list (first_name, last_name, email)" .
				"values ('$first_name', '$last_name', '$email')";
		
		mysqli_query($dbc, $query)
			or die('Query Fail');
			
		echo "first_name : $first_name / last_name : $last_name / email : $email <br/>";
		mysqli_close($dbc);
	}
}
?>
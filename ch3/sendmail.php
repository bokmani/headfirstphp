<?php

$from = 'test@test.com';

$subject = $_POST['subject'];
$text = $_POST['elvismail'];

$dbc = mysqli_connect('localhost', 'root', 'ckh1142', 'elvis_store');

$query = 'select * from email_list';

$result = mysqli_query($dbc, $query);

while($row = mysqli_fetch_array($result))
{
	//echo $row['first_name'] . ' ' . $row['last_name'] . ' ' . $row['email'] . '<br/>';
	
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	
	$msg = "Dear $first_name $last_name, \n $text";
	$to = $row['email'];

	mail($to, $subject, $message,'From:'.$from);
	
	echo 'Email sent to : ' . $to . '<br/>';
}

mysqli_close($dbc);



?>
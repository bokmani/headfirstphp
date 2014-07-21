<?php

$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];


$dbc = mysqli_connect('localhost', 'root', 'ckh1142', 'elvis_store')
	or die('Error Connect');


$query = "insert into email_list (first_name, last_name, email)".
		"values ('$first_name','$last_name','$email')";

mysqli_query($dbc, $query)
	or die('Error query');

echo 'Customer added';
mysqli_close($dbc);

header('Location:http://localhost/headfirstphp/ch4/addemail.html');

?>
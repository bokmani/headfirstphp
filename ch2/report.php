<?php

$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$when_it_happened = $_POST['whenithappened'];
$how_long = $_POST['howlong'];
$how_many = $_POST['howmany'];
$alien_description = $_POST['aliendescription'];
$what_they_did = $_POST['whattheydid'];
$fang_spotted = $_POST['fangspotted'];
$email = $_POST['email'];
$other = $_POST['other'];

$_db_user = 'root';
$_db_pass = 'ckh1142';

$dbc = mysqli_connect('localhost', $_db_user, $_db_pass, 'aliendatabase')
	or die('Error Connecting to MySQL Server');

$query = "INSERT INTO aliendatabase.aliens_abduction(".
		"first_name,last_name,when_it_happend,how_long,how_many,alien_description,what_they_did,fang_spotted,other,email)".
		"VALUES(".
		"'$first_name','$last_name','$when_it_happened','$how_long','$how_many','$alien_description','$what_they_did','$fang_spotted',".
		"'$other','$email')";

$result = mysqli_query($dbc, $query)
	or die('Error quering database');

mysqli_close($dbc);

echo 'Thanks for submitting the form.<br/>';
echo 'You were abdected ' . $when_it_happened;
echo ' and were gone for ' . $how_long . '<br/>';
echo 'Number of aliens : ' . $how_many . '<br/>';
echo 'Describe them : ' . $alien_description . '<br/>';
echo 'The aliens did this : ' . $what_they_did . '<br/>';
echo 'Was Fang there? ' . $fang_spotted . '<br/>';
echo 'Other comments : ' . $other . '<br/>';
echo 'Your email address is ' . $email;



?>
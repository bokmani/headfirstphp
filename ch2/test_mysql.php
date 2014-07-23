<?php

$dbc = mysqli_connect('khchoi2.local','root','ckh1142');
mysqli_select_db($dbc, 'aliendatabase');


$query = "INSERT INTO aliendatabase.aliens_abduction(".
"first_name,last_name,when_it_happend,how_long,how_many,alien_description,what_they_did,fang_spotted,other,email)".
"VALUES(".
"'Salley','Jones','3 days ago','1 day','four','green with six tentacles','We just talked and played with a dog','yes',".
"'I may have seend your dog. Contact me','rarara0@gmail.com')";
		
$result = mysqli_query($dbc, $query)
	or die('Error querying database');

mysqli_close($dbc)
?>
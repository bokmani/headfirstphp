<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Guita Wars - Remove a High Score</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h2> Guita Wars - Remove a High Score</h2>
<?php

require_once 'appvars.php';
require_once 'connectvars.php';

//get parameter 검
if (isset($_GET['id']) && isset($_GET['date']) && isset($_GET['name']) && isset($_GET['score']) && isset($_GET['screenshot']))
{
	$id = $_GET['id'];
	$date = $_GET['date'];
	$name = $_GET['name'];
	$score = $_GET['score'];
	$screenshot = $_GET['screenshot'];
}
else if (isset($_GET['id']) && isset($_GET['date']) && isset($_GET['name']) && isset($_GET['score']))
{
	$id = $_GET['id'];
	$date = $_GET['date'];
	$name = $_GET['name'];
	$score = $_GET['score'];
}
else
{
	echo '<p class="error">Sorry, no high score was specified for removal.</p>';
}

if (isset($_POST['submit']))
{
	if($_POST['confirm'] = 'Yes')
	{
		// Delete image
		@unlink(GW_UPLOADPATH . $screenshot);
		
		// connect db
		$dbc = mysqli_connect(DB_HOST, DB_USERS, DB_PASSWORD, DB_NAME);
		
		// retrieve score data
		$query = "delete from guitarwars where id = $id limit 1";
		mysqli_query($dbc, $query);
		mysqli_close($dbc);

		echo '<p>The high score of ' . $score . ' for ' . $name . ' was successfully removed.';
	}
	else 
	{
		echo '<p class="error">The high score was not removed.</p>';
	}
}
else if (isset($id) && isset($name) && isset($date))
{
	if(isset($score) && isset($screenshot))
	{
		echo '<p>Are you sure you want to delete the following high score?</p>';
		echo ''
	}
}


?>
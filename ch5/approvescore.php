<?php 
require_once 'authorize.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Guita Wars - Approve a High Score</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h2> Guita Wars - Approve a High Score</h2>
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
else if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['score']))
{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$score = $_POST['score'];
}
else
{
	echo '<p class="error">Sorry, no high score was specified for approval.</p>';
}

if (isset($_POST['submit']))
{
	if($_POST['confirm'] = 'Yes')
	{
		// connect db
		$dbc = mysqli_connect(DB_HOST, DB_USERS, DB_PASSWORD, DB_NAME);

		// retrieve score data
		$query = "update guitarwars set approved = 1 where id = $id";
		mysqli_query($dbc, $query)
			or die('Query Failed');
		mysqli_close($dbc);

		echo '<p>The high score of ' . $score . ' for ' . $name . ' was successfully approved.';
	}
	else
	{
		echo '<p class="error">Sorry, there was a problem approving the high score.</p>';
	}
}
else if (isset($id) && isset($name) && isset($date) && isset($score) && isset($screenshot))
{
	echo '<p>Are you sure you want to approve the following high score?</p>';
	echo '<p><strong>Name : </strong>' . $name . '<br/><strong>Date : </strong>' . $date . '<br/><strong>Score : </strong>' . $score . '</p>';
	echo '<form method="post" action="' . $_SERVER['PHP_SELF'] .'">';
	echo '<img src="' . GW_UPLOADPATH . $screenshot . '" width="160" alt="Score image" /><br/>';
	echo '<input type="radio" name="confirm" id="confirm_yes" value="Yes"/><label for="confirm_yes">Yes</label>';
	echo '<input type="radio" name="confirm" id="confirm_no" value="No"/><label for="confirm_no">No</label>';
	echo '<input type="submit" name="submit" value="Submit"/>';

	echo '<input type="hidden" name="id" value="' . $id . '"/>';
	echo '<input type="hidden" name="name" value="' . $name . '"/>';
	echo '<input type="hidden" name="score" value="' . $score . '"/>';
	echo '</form>';
}

echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';



?>
</body>
</html>

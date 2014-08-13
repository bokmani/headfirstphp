<?php 
require_once 'authorize.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Guita Wars - High Score Administrator</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h2> Guita Wars - High Score Administrator</h2>

<?php
require_once 'appvars.php';
require_once 'connectvars.php';


//DB connect
$dbc = mysqli_connect(DB_HOST, DB_USERS, DB_PASSWORD, DB_NAME);

//query
$query = 'select * from guitarwars order by score desc, date asc';

$data = mysqli_query($dbc, $query);


echo '<table>';
while ($row = mysqli_fetch_array($data))
{
	echo '<tr class="scorerow"><td><strong>' . $row['name'] . '</strong></td>';
	echo '<td>' . $row['date'] . '</td>';
	
	echo '<td>' . $row['score'] . '</td>';
	echo '<td><a href="removescore.php?id=' . $row['id'] . '&amp;date=' . $row['date'] . '&amp;name=' . $row['name'] . '&amp;score=' . $row['score']
 . '&amp;screenshot=' . $row['screenshot'] . '">Remove</a>';
	
	if($row['approved'] == '0')
	{
		echo ' / <a href="approvescore.php?id=' . $row['id'] . '&amp;date=' . $row['date'] . '&amp;name=' . $row['name'] . '&amp;score=' . $row['score'] . '&amp;screenshot=' . $row['screenshot'] .'">Approve</a>'; 
	}
	
	echo '</td></tr>';
	
}
echo '</table>';

mysqli_close($dbc);
?>
</body>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert title here</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php
//Define application constants
define('GW_UPLOADPATH', 'images/');

//Define DB Connection
define('DB_HOST', 'localhost');
define('DB_USERS', 'root');
define('DB_PASSWORD', 'ckh1142');
define('DB_NAME', 'guitarwarsdb');

//Connect to the databasse
$dbc = mysqli_connect(DB_HOST, DB_USERS, DB_PASSWORD, DB_NAME)
	or die('Connection Failed');

//score query
$query = 'select * from guitarwars';
$data = mysqli_query($dbc, $query)
	or die('Query Failed');
?>
<table>
<?php 
	while ($row = mysqli_fetch_array($data))
	{
?>
	<tr><td class="scoreinfo">
		<span class="score"><?php echo $row['score']; ?></span><br/>
		<strong>Name : </strong><?php echo $row['name']; ?> <br/>
		<strong>Date : </strong><?php echo $row['date']; ?> <br/>
		
<?php 
		if(is_file(GW_UPLOADPATH . $row['screenshot']) &&
			filesize(GW_UPLOADPATH . $row['screenshot']) > 0)
		{
			echo '<td><img src="' . GW_UPLOADPATH . $row['screenshot'] .'" alt="Score image" />';
		}
		else
		{
			echo '<td><img src="' . GW_UPLOADPATH . 'unverified.gif"  alt="Unverified image" />'; 
		}
?>
	</td></tr>
<?php 
	}
?>
</table>

<?php

mysqli_close($dbc);

?>




	<input type="submit" name="submit" value="Remove">
</form>
</body>
</html>
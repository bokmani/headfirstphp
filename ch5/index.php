<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Guitar Wars</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php
require_once 'appvars.php';
require_once 'connectvars.php';

//Connect to the databasse
$dbc = mysqli_connect(DB_HOST, DB_USERS, DB_PASSWORD, DB_NAME)
	or die('Connection Failed');

//score query
$query = 'select * from guitarwars order by score desc';
$data = mysqli_query($dbc, $query)
	or die('Query Failed');
?>
<table>
<?php 
	$i = 0;
	while ($row = mysqli_fetch_array($data))
	{
		if($i==0)
		{
?>
	<tr><td colspan="2" class="topscoreheader">Top Score : <?php echo $row['score']; ?> </td></tr>	
<?php 			
		}
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
		$i++;
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
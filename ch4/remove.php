<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert title here</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php
	$dbc = mysqli_connect('localhost', 'root', 'ckh1142', 'elvis_store')
		or die('Connection Fail');


	if(isset($_POST['submit']))
	{
		foreach ($_POST['todelete'] as $delete_id)
		{
			$query = "delete from email_list where id = $delete_id";
			
			mysqli_query($dbc, $query)
				or die('Query Failed : ' . $query);
		}
	
		echo 'Customer(s) removed <br/>';
	}
	
	
	$query = 'select * from email_list';
	$result = mysqli_query($dbc, $query)
			or die('Query Failed : ' . $query);
	
	while ($row = mysqli_fetch_array($result))
	{
?>
		<input type="checkbox" value="<?php echo $row['id']; ?>" name="todelete[]" />
		<?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?> <?php echo $row['email']; ?>
		<br/>
		
<?php 
	}
	
	mysqli_close($dbc);
?>

	<input type="submit" name="submit" value="Remove">
</form>
</body>
</html>

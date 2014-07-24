<!DOCTYPE html>
<html>
<head>
<meta charset="EUC-KR">
<title>Insert title here</title>
</head>
<body>
<?php
if(isset($_POST['submit']))
{
	$from = 'test@qoo10.com';
	$subject = $_POST['subject'];
	$text = $_POST['elvismail'];
	$output_form = false;
	
	
	if(empty($subject) && empty($text))
	{
		echo 'You forgot the email subject and body text.<br/>';
		$output_form = true;
	}
	
	if(empty($subject) && !empty($text))
	{
		echo 'You forgot the email subject.<br/>';
		$output_form = true;
	}
	
	if(!empty($subject) && empty($text))
	{
		echo 'You forget the email body text. <br/>';
		$output_form = true;
	}
	
	if(!empty($subject) && !empty($text))
	{
		$dbc = mysqli_connect('localhost', 'root', 'ckh1142', 'elvis_store');
		$query = 'select * from email_list';
		$result = mysqli_query($dbc, $query);
			
		while($row = mysqli_fetch_array($result))
		{
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
				
			$msg = "Dear $first_name $last_name, \n $text";
			$to = $row['email'];
	
			mail($to, $subject, $msg,'From:'.$from);
				
			echo 'Email sent to : ' . $to . ' : ' . $msg . '<br/>';
		}
	
		mysqli_close($dbc);
	}
}
else {
	$output_form = true;
}

if($output_form)
{
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

	<label for="subject">Subject of email : </label>
	<input type="text" id="subject" name="subject" value="<?php echo $subject; ?>"/><br/>
	
	<label for="elvismail">Body of email : </label>
	<textarea id="elvismail" name="elvismail" rows="8" cols="60"><?php echo $text ?></textarea>
	
	<input type="submit" name="submit" value="Submit"/>
</form>
<?php	
}
?>
</body>
</html>
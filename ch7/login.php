<?php
require_once 'connectvars.php';

session_start();
$error_msg = "";

if(!isset($_SESSION['user_id']))
{
	if(isset($_POST['submit']))
	{
		//connect to the database
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		
		//Grab the user-entered login-in data
		$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

		if(!empty($user_username) && !empty($user_password))
		{
			// Search database for find the user info
			$query = "select user_id, username from mismatch_user where username = '$user_username' and password = SHA('$user_password')";
			
			$data = mysqli_query($dbc, $query);
			
			if(mysqli_num_rows($data) == 1)
			{
				$row = mysqli_fetch_array($data);
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['username'] = $row['username'];
				
				setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));
				setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));
				
				$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
				header('Location: ' . $home_url);
			}
			else
			{
				$error_msg = '<h2>Mismatch</h2>Sorry, you must enter a valid username and password to log-in.';
			}
		}
		else
		{
			$error_msg = 'Sorry, you must enter your username and password to log-in.';
		}
	}	
}

mysqli_close($dbc);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Mismatch - Log In</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h3>Mismatch - Log In</h3>

<?php 
if(empty($_SESSION['user_id']))
{
	echo '<p class="error">' . $error_msg . '</p>';
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<fieldset>
		<legend>Log In</legend>
		<label for="username">Username:</label>
		<input type="text" id="username" name="username"
			value="<?php if(!empty($user_username)) echo $user_username; ?>"/><br/>
			
		<label for="password">Password:</label>
		<input type="password" id="password" name="password"/>
	</fieldset>
	<input type="submit" name="submit" value="Log In"/>
</form>
<?php 
}
else 
{
	echo '<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>';
}
?>
</body>
</html>
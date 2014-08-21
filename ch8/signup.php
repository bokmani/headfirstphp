<?php
// page header
$page_title = 'Sign Up';
require_once 'header.php';

require_once 'appvars.php';
require_once 'connectvars.php';
	
//Connect DB
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(isset($_POST['submit']))
{
	//Grab the profile data
	
	$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
	$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
	$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
		
	if(!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2))
	{
		//check already using this username
		$query = "select * from mismatch_user where username = '$username'";
		
		$data = mysqli_query($dbc, $query);
		
		if(mysqli_num_rows($data) == 0)
		{
			// username is unique, so insert the data into the database
			$query = "insert into mismatch_user (username, password, join_date) values" .
						"('$username',SHA('$password'),NOW())";
			
			mysqli_query($dbc, $query);
			
			echo '<p>Your new account has been successfully created. You\'re now ready to log in and ' .
					'<a href="editprofile.php">edit your profile</a>.</p>';
			
			mysqli_close($dbc);
			exit();
		}
		else
		{
			echo '<p class="error">An account already exists for this username. Please use a different address';
			$username = "";
		}
	}
	else
	{
		echo '<p class="error">You must enter all of the sign-up date, including the desired password' . 
			'twice.</p>';
	}
}
?>

<p>Please enter your username and desired password to sign up to Mismatch.</p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<fieldset>
		<legend>Registration Info</legend>
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" value="<?php if(!empty($username)) echo $username; ?>"/><br/>
		
		<label for="password1">Password:</label>
		<input type="password" id="password1" name="password1"/><br/>
		
		<label for="password2">Password(retype):</label>
		<input type="password" id="password2" name="password2"/><br/>
	</fieldset>
	<input type="submit" value="Sign Up" name="submit"/>
</form>

<?php 
require_once 'footer.php';
?>

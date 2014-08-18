<?php
session_start();

if(!isset($_SESSION['user_id']))
{
	if(isset($_COOKIE['user_id']) && isset($_COOKIE['username']))
	{
		$_SESSION['user_id'] = $_COOKIE['user_id'];
		$_SESSION['username'] = $_COOKIE['username'];
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional // EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Mismatch - Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h3>Mismatch - Edit Profile</h3>

<?php 
require_once 'appvars.php';
require_once 'connectvars.php';

//Login check - navigation bar
if(!isset($_SESSION['user_id']))
{
	echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
	exit();
}
else
{
	echo '<p class="login">You are logged in as ' . $_SESSION['username'] . '. <a href="logout.php">Log Out</a>';
}

// Connect DB
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// submit 
if(isset($_POST['submit']))
{
	$first_name = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
	$last_name = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
	$gender = mysqli_real_escape_string($dbc, trim($_POST['gender']));
	$birthdate = mysqli_real_escape_string($dbc, trim($_POST['birthdate']));
	$city = mysqli_real_escape_string($dbc, trim($_POST['city']));
	$state = mysqli_real_escape_string($dbc, trim($_POST['state']));
	$old_picture = mysqli_real_escape_string($dbc, trim($_POST['old_picture']));
	$new_picture = mysqli_real_escape_string($dbc, trim($_POST['new_picture']));
	$new_picture_type = $_FILES['new_picture']['type'];
	$new_picture_size = $_FILES['new_picture']['size'];
	
	list($new_picture_width, $new_picture_height) = getimagesize($_FILES['new_picture']['tmp_name']);
	$error = false;
	
	if(!empty($new_picture))
	{
		$error = true;
	}

	if(!$error)
	{
		if(!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($birthdate) && !empty($city) && !empty($state))
		{
			if(!empty($new_picture))
			{
				$query = "update mismatch set first_name = '$first_name', last_name = '$last_name', gender = '$gender', ".
						" birthdate = '$birthdate', city = '$city', state = '$state', picture = '$picture' where user_id = '" . $_SESSION['user_id'] . "'";
			}
			else 
			{
				$query = "update mismatch_user set first_name = '$first_name', last_name = '$last_name', gender = '$gender', ".
						" birthdate = '$birthdate', city = '$city', state = '$state' where user_id = '" . $_SESSION['user_id'] . "'";
			}
			
			mysqli_query($dbc, $query);
			
			// confirm success with the user
			echo '<p>Your profile has been succesfully updated. Would you like to <a href="viewprofile.php">view your profile</a>';
			
			mysqli_close($dbc);
			exit();
		}
		else
		{
			echo '<p>You must enter all of the profile data (the picture is optional).</p>';
		}
	}
}
else
{
	$query = "select username, first_name, last_name, gender, birthdate, city, state, picture from mismatch_user where user_id = '" .
			$_SESSION['user_id'] . "'";
	
	$data = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($data);
	
	if($row != null)
	{
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$gender = $row['gender'];
		$birthdate = $row['birthdate'];
		$city = $row['city'];
		$state = $row['state'];
		$old_picture = $row['old_picture'];
	}
	else 
	{
		echo '<p class="error">There was a problem accessing your profile.</p>';
	}
}

mysqli_close($dbc);
?>

<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />
	<fieldset>
		<legend>Personal Information</legend>
		<label for="firstname">First name:</label>
		<input type="text" id="firstname" name="firstname" value="<?php if(!empty($first_name)) echo $first_name; ?>" /><br/>

		<label for="lastname">Last name:</label>
		<input type="text" id="lastname" name="lastname" value="<?php if(!empty($last_name)) echo $last_name; ?>" /><br/>

		<label for="gender">Gender:</label>
		<select id="gender" name="gender">
			<option value="M" <?php if(!empty($gender) && $gender=='M') echo 'selected = "selected"'; ?>>Male</option>
			<option value="F" <?php if(!empty($gender) && $gender=='F') echo 'selected = "selected"'; ?>>Female</option>
		</select><br/>
		
		<label for="birthdate">Birthdate:</label>
		<input type="text" id="birthdate" name="birthdate" value="<?php if(!empty($birthdate)) echo $birthdate; else echo 'YYYY-MM-DD'; ?>" /><br/>
		
		<label for="city">City:</label>
		<input type="text" id="city" name="city" value="<?php if(!empty($city)) echo $city; ?>" /><br/>
	
		<label for="state">State:</label>
		<input type="text" id="state" name="state" value="<?php if(!empty($state)) echo $state; ?>" /><br/>
	
		<input type="hidden" name="old_picture" value="<?php if(!empty($old_picture)) echo $old_picture; ?>" />	
		<label for="new_picture">Picture:</label>
		<input type="file" id="new_picture" name="new_picture" />
		<?php
		if(!empty($old_picture))
		{
			echo '<img src="' . MM_UPLOADPATH . $old_picture .'" alt="Profile Picture" />';
		}
		?>
	</fieldset>
	<input type="submit" value="Save Profile" name="submit"/>
</form>
</body>
</html>
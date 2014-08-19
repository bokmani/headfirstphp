<?php
// start session
require_once 'startsession.php';

// page header
$page_title = 'View Profile';
require_once 'header.php';

require_once 'appvars.php';
require_once 'connectvars.php';

//Login check - navigation bar
if(!isset($_SESSION['user_id']))
{
	echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
	exit();
}

// navigation menu
require_once 'navmenu.php';


// Connect DB
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// grab the profile data
if(!isset($_GET['user_id']))
{
	$query = "select username, first_name, last_name, gender, birthdate, city, state, picture from mismatch_user where user_id = '" .
				$_SESSION['user_id'] . "'";
}
else
{
	$query = "select username, first_name, last_name, gender, birthdate, city, state, picture from mismatch_user where user_id = '" .
				$_GET['user_id'] . "'";
}

$data = mysqli_query($dbc, $query);

if(mysqli_num_rows($data) == 1)
{
	$row = mysqli_fetch_array($data);
	
	echo '<table>';
	
	if(!empty($row['username']))
	{
		echo '<tr><td class="label">Username : </td><td>' . $row['username'] .'</td></tr>';
	}
	
	if(!empty($row['first_name']))
	{
		echo '<tr><td class="label">First name : </td><td>' . $row['first_name'] .'</td></tr>';
	}

	if(!empty($row['last_name']))
	{
		echo '<tr><td class="label">Last name : </td><td>' . $row['last_name'] .'</td></tr>';
	}
	
	if(!empty($row['gender']))
	{
		echo '<tr><td class="label">Gender : </td><td>';
		
		if($row['gender'] == 'M')
		{
			echo 'Male';
		}
		else if ($row['gender'] == 'F')
		{
			echo 'Female';
		}
		else
		{
			echo '?';	
		}		
		echo '</td></tr>';
	}

	if(!empty($row['birthdate']))
	{
		if(!isset($_GET['user_id']) || $_SESSION['user_id'] == $_GET['user_id'])
		{
			echo '<tr><td class="label">Birthdate : </td><td>' . $row['birthdate'] .'</td></tr>';
		}
		else
		{
			list($year, $month, $day) = explode('-', $row['birthdate']);
			echo '<tr><td class="label">Year born : </td><td>' . $year . '</td></tr>';
		}
	}

	if(!empty($row['city']) || !empty($row['state']))
	{
		echo '<tr><td class="label">Location : </td><td>' . $row['city'] . ', ' , $row['state'] . '</td></tr>';
	}
	
	if(!empty($row['picture']))
	{
		echo '<tr><td class="label">Picture : </td><td><img src="' . MM_UPLOADPATH . $row['picture'] .'" alt="profile picture"/></td></tr>';
	}
	
	echo '</table>';
	
	if(!isset($_GET['user_id']) || $_SESSION['user_id'] == $_GET['user_id'])
	{
		echo '<p> Would you like to <a href="editprofile.php">edit your profile</a>?</p>';
	}
}
else 
{
	echo '<p class="error">There was a problem accessing your profile.</p>';
}

mysqli_close($dbc);
?>

<?php 
require_once 'footer.php';
?>

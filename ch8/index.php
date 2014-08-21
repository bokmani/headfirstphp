<?php
// start session
require_once 'startsession.php';

// page header
$page_title = 'Where opposites attract!';
require_once 'header.php';

require_once 'appvars.php';
require_once 'connectvars.php';

// navigation menu
require_once 'navmenu.php';

// Connect DB
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// query
$query = "select user_id, first_name, picture from mismatch_user where first_name is not null order by join_date desc limit 5";
$data = mysqli_query($dbc, $query);

echo '<h4>Latest members</h4>';
echo '<table>';

while($row = mysqli_fetch_array($data))
{
	if(is_file(MM_UPLOADPATH . $row['picture']) && filesize(MM_UPLOADPATH . $row['picture']) > 0)
	{
		echo '<tr><td><img src="' . MM_UPLOADPATH . $row['picture'] . '" alt="' . $row['first_name'] . '" /></td>';
	}
	else 
	{
		echo '<tr><td><img src="' . MM_UPLOADPATH . 'nopic.jpg" alt="' . $row['first_name'] . '" /></td>';
	}
	
	if(isset($_SESSION['user_id']))
	{
		echo '<td><a href="viewprofile.php?user_id=' . $row['user_id'] . '">' . $row['first_name'] . '</a></td></tr>';
	}
	else
	{
		echo '<td>' . $row['first_name'] . '</td></tr>';
	}
}

echo '</table>';

mysqli_close($dbc);
?>

<?php 
require_once 'footer.php';
?>
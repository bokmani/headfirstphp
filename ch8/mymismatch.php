<?php
// start session
require_once 'startsession.php';

// page header
$page_title = 'My Mismatch';
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

$query = "select user_id from mismatch_response where user_id = '" . $_SESSION['user_id']. "'";
$data = mysqli_query($dbc, $query);
if(mysqli_num_rows($data) != 0)
{
	$query = "select mr.response_id, mr.topic_id, mr.response, mt.name as topic_name " .
			"from mismatch_response mr " .
			"inner join mismatch_topic mt on mr.topic_id = mt.topic_id " .
			" where mr.user_id = '" . $_SESSION['user_id']. "'";
	
	
	$data = mysqli_query($dbc, $query);
	$user_responses = array();
	
	while ($row = mysqli_fetch_array($data))
	{
		array_push($user_responses, $row);
	}
	
	$mismatch_score = 0;
	$mismatch_user_id = -1;
	$mismatch_topic = array();
	
	$query = "select user_id from mismatch_user where user_id != '" . $_SESSION['user_id'] . "'";
	$data = mysqli_query($dbc, $query);
	
	while ($row = mysqli_fetch_array($data))
	{
		// Grab the response data for the user (a potential mismatch)
		$query2 = "select response_id, topic_id, response from mismatch_response where user_id = '" . $row['user_id'] . "'";
		$data2 = mysqli_query($dbc, $query2);
	
		$mismatch_responses = array();
		while ($row2 = mysqli_fetch_array($data2))
		{
			array_push($mismatch_responses, $row2);
		}
	
		$score = 0;
		$topics = array();
		for($i = 0;  $i<count($user_responses); $i++)
		{
			if($user_responses[$i]['response'] + $mismatch_responses[$i]['response'] == 3)
			{
				$score += 1;
				array_push($topics, $user_responses[$i]['topic_name']);
			}
		}
	
		if($score > $mismatch_score)
		{
			$mismatch_score = $score;
			$mismatch_user_id= $row['user_id'];
			$mismatch_topics = array_slice($topics, 0);
		}
	}
	
	// Make sure a mismatch was found
	if($mismatch_user_id != -1)
	{
		$query = "select username, first_name, last_name, city, state, picture from mismatch_user where user_id = '$mismatch_user_id'";
		$data = mysqli_query($dbc, $query);
		
		if(mysqli_num_rows($data) == 1)
		{
			$row = mysqli_fetch_array($data);
			echo '<table><tr><td class="label">';
			if(!empty($row['first_name']) && !empty($row['last_name']))
			{
				echo $row['first_name'] . ' ' . $row['last_name'] . '<br/>';
			}
			
			if(!empty($row['city']) && !empty($row['state']))
			{
				echo $row['city'] . ', ' . $row['state'] . '<br/>';
			}
			
			echo '</td><td>';
			
			if(!empty($row['picture']))
			{
				echo '<img src="' . MM_UPLOADPATH . $row['picture'] . '" alt="Profile Picture" /><br/>';
			}
			
			echo '</td></tr></table>';
			
			
			//display the mismatched topic
			echo '<h4>You are mismatched on the following ' . count($mismatch_topics) . ' topics : </h4>';
			foreach ($mismatch_topics as $topic)
			{
				echo $topic . '<br/>';
			}
			
			//Display a link to the mismatch user's profile
			echo '<h4>View <a href="viewprofile.php?user_id=' . $mismatch_user_id . '">' . $row['first_name'] . '\'s profile</a><h4>';
		}
	}
}
else
{
	echo '<p>You must frist <a href="questionnaire.php">answer the questionnaire</a> before yo can be mismatched.</p>';
}



?>




<?php 
require_once 'footer.php';
?>
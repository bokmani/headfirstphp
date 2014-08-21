<?php
// start session
require_once 'startsession.php';

// page header
$page_title = 'Questionnaire';
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

// If this user has never ansered the questionnaire, insert empty response into the database 
$query = "select * from mismatch_response where user_id ='" . $_SESSION['user_id'] . "'";
$data = mysqli_query($dbc, $query);

if(mysqli_num_rows($data) == 0)
{
	// first grab the list of topic IDS from the topic table
	$query_topic = "select topic_id, name, category_id from mismatch_topic order by category_id, topic_id";
	$data_topic = mysqli_query($dbc, $query_topic);
	
	$topicIDs = array();
	while($row = mysqli_fetch_array($data_topic))
	{
		array_push($topicIDs, $row['topic_id']);
	}
	
	//insert empty response rows into the response table, one per topic
	foreach ($topicIDs as $topic_id)
	{
		$query_insert_response = "insert into mismatch_response (`user_id`,`topic_id`) values ('" . $_SESSION['user_id'] . "', '$topic_id')";
		mysqli_query($dbc, $query_insert_response);
	}
}

// If the questionnaire form has been submitted, write the form response to the database
if(isset($_POST['submit']))
{
	foreach ($_POST as $response_id => $response)
	{
		$query_update = "update mismatch_response set response = '$response' where response_id = '$response_id'";
		mysqli_query($dbc, $query_update);
	}
	
	echo '<p>Your responses have been save.';
}

// Grab the response data from the database to generate the form
$query = "select mr.response_id, mr.response, mt.topic_id, mt.name as topic_name, mc.category_id, mc.name as category_name " .  
		"from mismatch_response mr " . 
		"inner join mismatch_topic mt on mr.topic_id = mt.topic_id " .
		"inner join mismatch_category mc on mt.category_id = mc.category_id " . 
		"where mr.user_id = '" . $_SESSION['user_id'] . "'";

$data = mysqli_query($dbc, $query);
$responses = array();

while ($row = mysqli_fetch_array($data))
{
	array_push($responses, $row);
}

mysqli_close($dbc);
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<p>How do you feel about each topic?</p>
<?php 
$category = $responses[0]['category_name'];
echo '<fieldset><legend>' . $responses[0]['category_name'] . '</legend>';
foreach ($responses as $response)
{
	//Only start a new fieldset if the category has changed
	if($category != $response['category_name'])
	{
		$category = $response['category_name'];
		echo '</fieldset><fieldset><legend>' . $response['category_name'] . '</legend>';
	}
	
	//Display the topic form field
	echo '<label ' . ($response['response'] == null ? 'class="error"' : '') . 'for ="' . $response['response_id'] . '">' . $response['topic_name'] . '</label>';
	echo '<input type="radio" id="' . $response['response_id'] . '" name="' . $response['response_id'] . '" value="1" ' . ($response['response'] == 1 ? 'checked="checked"' : '') . '/>Love';
	echo '<input type="radio" id="' . $response['response_id'] . '" name="' . $response['response_id'] . '" value="2" ' . ($response['response'] == 2 ? 'checked="checked"' : '') . '/>Hate<br/>';
}
echo '</fieldset>';
echo '<input type="submit" value="Save Questionnaire" name="submit"/>';
?>
</form>


<?php 
require_once 'footer.php';
?>
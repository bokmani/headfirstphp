<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Guita Wars - Add Your High Score</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h2> Guita Wars - Add Your High Score</h2>

<?php
require_once 'appvars.php';
require_once 'connectvars.php';

if(isset($_POST['submit']))
{
	//POST data get
	$name = $_POST['name'];
	$score = $_POST['score'];
	$screenshot = $_FILES['screenshot']['name'];
	
	
	$screenshot_type = $_FILES['screenshot']['type'];
	$screenshot_size = $_FILES['screenshot']['size'];
	
	if(!empty($name) && !empty($score) && !empty($screenshot))
	{
		if($_FILES['screenshot']['error]'] == 0)
		{
			//파일정보
			$target = GW_UPLOADPATH . time() . '.' .$screenshot_type;
			
			if(image_move($_FILES['screenshot']['tmp_name'], $target))
			{
				//Connect to the databasse
				$dbc = mysqli_connect(DB_HOST, DB_USERS, DB_PASSWORD, DB_NAME)
				or die('Connection Failed');
					
				$query = "insert into guitarwars (date, name, score, screenshot) values(NOW(), '$name', $score, '$screenshot')";
					
				mysqli_query($dbc, $query)
				or die('Query Failed');
			
				//
				echo '<p>Thanks for adding your new high score!</p>';
				echo '<p><strong>Name : </strong>' . $name . '<br/>';
				echo '<strong>Score : </strong>' . $score . '<br/>';
				echo '<img src="' . GW_UPLOADPATH . $screenshot . '" alt="Score Image"/></p>';
				echo '<p><a href="index.php">&lt;&lt; Back to the high scores</a></p>';
					
				$name = "";
				$score = "";
					
				mysqli_close($dbc);
			}
			else
			{
				echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
				return;
			}				
		}
		else
		{
			echo '<p class="error">The screen shot must be a GIF, JPEG, or PNG image file no greater than ' . (GW_MAXFILESIZE/1024) . 'KB in size.</p>';
		}
		
		//임시파일 삭제
		@unlink($_FILES['screenshot']['tmp_name']);
	}
	else
	{
		echo '<p class="error">Please enter all of the information to add your high score.</p>';
	}
}

function image_move($path, $target)
{
	
	// folder check : folder�� ��� ��� ��
	$dir = dirname($target);
	if (!file_exists ($dir)) {
		mkdir($dir);		
	}

	if(file_exists($target) && is_file($target))
	{
		unlink($target);
	}
	
	return move_uploaded_file($path, $target);	
}
?>
<hr/>
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<!-- 	<input type="hidden" name="MAX_FILE_SIZE" value="3276800" /> -->
	<label for=name">Name : </label><input type="text" id="name" name="name" value="<?php if(!empty($name)) echo $name; ?>" /><br/>
	<label for=score">Score : </label><input type="text" id="score" name="score" value="<?php if(!empty($score)) echo $score; ?>" /><br/>
	<label for="screenshot">Screen Shot : </label><input type="file" id="screenshot" name="screenshot">
	<hr/>
	<input type="submit" name="submit" value="Add">
</form>
</body>
</html>
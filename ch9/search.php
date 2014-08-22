<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php
function build_query($user_search, $sort)
{
	$search_query = "select job_id, title, state, description, date_posted from riskyjobs ";
	
	// where
	$clean_search = str_replace(',', ' ', $user_search);
	$search_words = explode(' ', $clean_search);
	
	$final_search_words = array();
	
	if(count($search_words) > 0)
	{
		foreach ($search_words as $word)
		{
			if(!empty($word))
				$final_search_words[] = $word;
		}
	}
	
	$where_list = array();
	if(count($final_search_words) > 0)
	{
		foreach ($final_search_words as $word)
			$where_list[] = "description like '%$word%'";
	}
	
	$where_clause = implode(' or ', $where_list);
	
	if(!empty($where_clause))
	{
		$search_query .= "where $where_clause";
	}
	
	//Sort
	switch ($sort)
	{
		case 1:
			$search_query .= " order by title";
			break;
		
		case 2:
			$search_query .= " order by title desc";
			break;
		case 3:
			$search_query .= " order by state";
			break;
		case 4:
			$search_query .= " order by state desc";
			break;
		case 5:
			$search_query .= " order by date_posted";
			break;
		case 6:
			$search_query .= " order by date_posted desc";
			break;
		default:
	}
	
	return $search_query;
}

function generate_sort_link($user_search, $sort)
{
	$sort_links = '';

	switch ($sort)
	{
		case 1:
			$sort_links .= '<td><a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=2">Job Title</td><td>Description</td>';
			$sort_links .= '<td><a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=3">State</a></td>';
			$sort_links .= '<td><a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=5">Date Posted</a></td>';
			break;
		case 3:
			$sort_links .= '<td><a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=1">Job Title</td><td>Description</td>';
			$sort_links .= '<td><a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=4">State</a></td>';
			$sort_links .= '<td><a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=5">Date Posted</a></td>';
			break;
		case 5:
			$sort_links .= '<td><a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=1">Job Title</td><td>Description</td>';
			$sort_links .= '<td><a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=3">State</a></td>';
			$sort_links .= '<td><a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=6">Date Posted</a></td>';
			break;
		default:
			$sort_links .= '<td><a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=1">Job Title</td><td>Description</td>';
			$sort_links .= '<td><a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=3">State</a></td>';
			$sort_links .= '<td><a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=5">Date Posted</a></td>';
	}
	
	return $sort_links;
}

function generate_page_links($user_search, $sort, $cur_page, $num_pages)
{
	$page_links = '';
	
	if($cur_page > 1)
	{
		$page_links .= '<a href="' . $_SERVER['PHP_SELF'] . '?userserach=' . $user_search . '&sort=' . $sort . '&page=' . ($cur_page - 1) . '"><-</a>';
	}
	else 
	{
		$page_links .= '<-';
	}
	
	for ($i = 1; $i <= $num_pages; $i++)
	{
		if($cur_page == $i)
		{
			$page_links .= ' ' . $i;
		}
		else 
		{
			$page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=' . $sort . '&page=' . $i . '">' . $i .'</a>';
		}
	}
	
	if($cur_page < $num_pages)
	{
		$page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=' . $sort . '&page=' . ($cur_page + 1) . '">-></a>';
	}
	else 
	{
		$page_links .= '->';
	}
	
	return $page_links;
}

$sort = $_REQUEST['sort'];
$user_search = $_REQUEST['usersearch'];

//calculate pagination
$cur_page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
$result_per_page = 5;
$skip = ($cur_page - 1) * $result_per_page;


//Query
require_once 'connectvars.php';
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$query = build_query($user_search, $sort);
$result = mysqli_query($dbc, $query);
$total = mysqli_num_rows($result);
$num_pages = ceil($total / $result_per_page);


echo '<table border="0" cellpadding="2">';
echo '<tr class="heading">';
echo generate_sort_link($user_search,$sort);
echo '</tr>';

$query = $query . " limit $skip, $result_per_page";
$result = mysqli_query($dbc, $query);
while($row = mysqli_fetch_array($result))
{
	echo '<tr class="result">';
	echo '<td valign="top" width="20%">' . $row['title'] . '</td>';
	echo '<td valign="top" width="50%">' . substr($row['description'],0,100) . '...</td>';
	echo '<td valign="top" width="10%">' . $row['state'] . '</td>';
	echo '<td valign="top" width="20%">' . substr($row['date_posted'],0,10) . '</td>';
	
}

echo '</table>';

if($num_pages > 1)
{
	echo generate_page_links($user_search, $sort, $cur_page, $num_pages);
}
mysqli_close($dbc);
			
?>
</body>
</html>
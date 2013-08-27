<?php
	require("connection.php");

	$data = array();
	$rows_per_page = 10;
	$query = "SELECT * from leads where leads.first_name like '{$_POST['name']}%' or 
		leads.last_name like '{$_POST['name']}%' and leads.registered_datetime BETWEEN '{$_POST['from_date']}' AND '{$_POST['to_date']}'";
	$total_records = mysql_num_rows(mysql_query($query));
	$total_pages = ceil($total_records/$rows_per_page);

	$page_links = "";
	for($i=0;$i<$total_pages;$i++)
	{
		$text = $i + 1;
		$page_links .= "<a href='' number = '{$text}' class='lnk'>{$text}</a>";
		if($i < ($total_pages - 1))
		{
			$page_links .= '|';
		}
	}

	$start = 1;
	if(isset($_POST['start']) && !empty($_POST['start'])) {
		$start = ($_POST['start'] - 1) * $rows_per_page;
	}

	$query	.= "LIMIT {$start}, 10";
	//var_dump($_POST);
	//echo $query;
	//die();

	$users = fetch_all($query);

	$html = "";
		$html .= "
		<table border='1'>
			<thead>
				<tr>
					<th>leads_id</th>
					<th>first_name</th>
					<th>last_name</th>
					<th>registered_datetime</th>
					<th>email</th>
				</tr>
			</thead>
			<tbody>
		";

	foreach($users as $user)
	{
		$html .= "
			<tr>
				<td>{$user['leads_id']}</td>
				<td>{$user['first_name']}</td>
				<td>{$user['last_name']}</td>
				<td>{$user['registered_datetime']}</td>
				<td>{$user['email']}</td>
			</tr>
			";
	}
	$html .= "
			</tbody>
		</table>
	";
	$data['html'] = $html;
	$data['page_links'] = $page_links;
	echo json_encode($data);
?>
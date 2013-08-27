<?php
	session_start();
	require("connection.php");


	// function post_message()
	// {
		$errors = array();
		if(empty($_POST['message']))
		{
			$errors[] = "Messsage cannot be empty!";
			$_SESSION['message_error'] = $errors;
			// header('Location: index.php');

		}
		else
		{
		 	$query = "INSERT INTO posts (description, udated_at,created_at)
                                    VALUES ('{$_POST['message']}', NOW(), NOW())";
		 	mysql_query($query);

		 	$query1 = "SELECT * FROM posts ORDER BY posts.created_at ASC";
			$rows = fetch_all($query1);
			$html ="";

			foreach($rows as $row)
			{

				$html .="
					<div class='boxed'>
						<p>{$row['description']}</p>
					</div>
					";

			}
		}
			//";
			$data['html'] = $html;
			echo json_encode($data);

				//$_SESSION['post_error'] = $errors;
				//header("Location: index.php");

	// }

	// post_message();


?>
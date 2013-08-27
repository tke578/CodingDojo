<?php
	session_start();
	require("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Posts</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-wip/css/bootstrap.min.css">
	<style>
	.boxed{
		border:1px solid green;	
		width:150px;
		border-radius: 10px;
		float: right;
		/*line-height: 5px;*/
		height: 50px;
	}
	.boxed p{
		margin-left: 10px;
	}
	</style>
</head>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#message_post').submit(function(){
				$.post(
					$(this).attr('action'),
					$(this).serialize(),
					function(data){
							$('#results').html(data.html);
					},
					"json"
				);
				return false;//means do no refresh the page!
			});
			//$('#message_post').submit();
		});
	</script>
<body>
	<div id="wrapper">
		<div class="page-header">
			<h1>My Posts:</h1>
			<div id="results"></div>
		</div>
<?php
	// if(isset($_SESSION['message_error']))
	// 			{
	// 				echo '<div class="alert alert-danger">';
	// 				foreach($_SESSION['message_error'] as $error)
	// 				{
	// 					echo $error . '<br>';
	// 				}
	// 				unset($_SESSION['messsage_error']);
	// 				echo '</div>';
	// 			}
?>


		<form  id="message_post" action="process.php" method="POST">
			<label for="note">Add a note:</label>
			<input type="text"  id="message" name="message">
			<button type="submit" class="btn btn-success">Post it!</button>
		</form>
	</div>
	
</body>
</html>

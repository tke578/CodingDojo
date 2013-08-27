<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Ajax</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#register").on('submit', function(){
				var form = $(this);
				$.post(form.attr('action'), form.serialize(), function(data){
					console.log(data.status);
					console.log(data.message);
				
					$('#status_message').append(
						data.message
					);			
				
				}, "json");
				return false;
			});
		});
	</script>
</head>
<body>
	<div id="wrapper">
		<h1>Ajax Example</h1>
		<form id="register" action="process.php" method="post">
			<label for="email">Email:</label>
			<input type="text" id="email" name="email"/>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password"/>
			<input type="submit" />
		</form>
		<div id="status_message"></div>
	</div> <!-- end of wrapper-->
</body>
</html>
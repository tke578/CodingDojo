<!DOCTYPE html>
<html>
<head>
	<title>Ajax</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /> -->
</head>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.date').datepicker();

			$('#search_text').keyup(function(){
				$('#test_form').submit();
			});

			$('#test_form').submit(function(){
				$.post(
					$(this).attr('action'),
					$(this).serialize(),
					function(data){
						$('#results').html(data.html);
					},
					"json"
				);
				return false;
			});
			$('#test_form').submit();
		});
	</script>
<body>
	<form id="test_form"action="process.php" method="post">
		Name: <input id="search_text" type="text" name="name"/>
		From: <input class="date" type="text" name="from_date"/>
		To: <input class="date" type="text" name="to_date"/>
		<input type="submit" value="submit"/>
	</form>

	<div id="results"></div>
</body>
</html>
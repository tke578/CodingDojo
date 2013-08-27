<!DOCTYPE html>
<html>
<head>
	<title>Ajax</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /> -->
</head>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.date').datepicker({dateFormat:"yy-mm-dd"});
			 //$('.date').change(function(){
			  	//$('#test_form').submit();
			 //});
			$('#search_text').keyup(function(){
				$('#test_form').submit();
			});
			$('#test_form').submit(function(){
				$.post(
					$(this).attr('action'),
					$(this).serialize(),
					function(data){
						$('#results').html(data.html);
						$('#page_links').html(data.page_links);

						$('.lnk').click(function(){
							var page_number = $(this).attr('number');
								$('#start').val(page_number);
								$('#test_form').submit();
								return false;
						});
					},
					"json"
				);
				return false;
			});
			//$('#test_form').submit();
		});
	</script>
<body>
	<form id="test_form"action="process.php" method="post">
		Name: <input id="search_text" type="text" name="name"/>
		From: <input class="date" type="text" name="from_date"/>
		To: <input class="date" type="text" name="to_date"/>
		<input id="start" type="hidden" name="start">
		<input type="submit" value="submit"/>
	</form>
	<div id="page_links"></div>
	<div id="results"></div>
</body>
</html>
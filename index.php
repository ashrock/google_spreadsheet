<html>
	<head>
		<title>Google Spreadsheet</title>
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function()
		{
			$.getJSON
			(
				"http://cors.io/spreadsheets.google.com/feeds/list/0AlTA82kYllmudHNpSVRKRF9fTjBhR2dEU3ZBQ21sb0E/od6/public/values?alt=json", 
				function(data) 
				{
			  		var element = $("div#content");

					if(data.feed.entry.length > 0)
					{
						element.empty();

						data.feed.entry.forEach(function(book){
							element.append("<blockquote><p>"+book['gsx$title']['$t']+"</p><small>"+book['gsx$author']['$t']+"</small></blockquote>");
						});
					}
					else
					{
						element.html("<div class='alert alert-warning'>No Books available!</div>");
					}
				}
			);
		});
		</script>
	</head>
	<body>		
		<div class='container'>
			<h1>List of Books</h1>	
			<div id='content' class='row'>
				
			</div>
		</div>
	</body>
</html>
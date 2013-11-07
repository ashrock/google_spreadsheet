<html>
	<head>
		<title>Google Spreadsheet</title>
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
	</head>
	<body>		
		<div class='container'>
			<h1>List of Books</h1>	
			<div id='content' class='row'>
				<?php 
					$spreadsheet_data = curl_post("https://spreadsheets.google.com/feeds/list/0AlTA82kYllmudHNpSVRKRF9fTjBhR2dEU3ZBQ21sb0E/od6/public/values?alt=json");

					$feed = json_decode($spreadsheet_data, TRUE);

					if(count($feed['feed']['entry']) > 0){
						foreach($feed['feed']['entry'] as $book){
							echo "<blockquote><p>". $book['gsx$title']['$t']."</p><small>".$book['gsx$author']['$t']."</small></blockquote>";
						}
					}else{
						echo "<div class='alert alert-warning'>No Books available!</div>";
					}
				?>
			</div>
		</div>
	</body>
</html>

<?php 
	function curl_post($url, array $post = NULL, array $options = array())
	{
	  	$curlCon = curl_init($url);
		curl_setopt($curlCon,CURLOPT_HEADER,FALSE);
		curl_setopt($curlCon,CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($curlCon,CURLOPT_HTTPHEADER, array("Content-type: application/"));
		curl_setopt($curlCon, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curlCon, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curlCon,CURLOPT_FRESH_CONNECT,true);

		$pageContent = curl_exec($curlCon);

		return $pageContent;

	}//End function

?>
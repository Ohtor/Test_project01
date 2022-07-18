<?php
 //include('core/init.inc.php'); 
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title> Project protected area </title>
	</head>
	<body>
		<p>	
			You are logged in as <?php echo $_SESSION['username'];?>
		</p>
		<p>
			<a href="logout.php">Logout? </a>
		</p>
		<?php
			$html = "";
			$url = "https://sportacentrs.com/static/non-publish/rss/sc/hokejs/nhl/rss.xml";
			$xml = simplexml_load_file($url);
			$i = 1;
			while ($xml->channel->item[$i]->title != null)
			{
			$title = $xml->channel->item[$i]->title;
			$title2 = $xml->channel->item[$i]->title2;
			$link = $xml->channel->item[$i]->link;
			$description = $xml->channel->item[$i]->description;
			$category = $xml->channel->item[$i]->category;
			$pubDate = $xml->channel->item[$i]->pubDate;
			$html .= "<div><h3>$title</h3>$title2<br />$link<br />$description<br />$category<br />$pubDate</div>";	
			$i++;
			}
			echo $html;
		?>
	</body>
</html>
﻿<!doctype html>
<html lang="sv">
<head>
	<meta charset="utf-8">
	<title>Magic Mirror</title>
	<meta name="description" content="The Magic Mirror">
	<meta http-equiv="refresh" content="1800" /> <!-- Updates the whole page every 30 minutes (each 1800 second) -->
	<link rel="stylesheet" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
		<script language="JavaScript"> <!-- Getting the current date and time and updates them every second -->
			setInterval(function() {
				var currentTime = new Date ( );
				var currentHours = currentTime.getHours ( );
				var currentMinutes = currentTime.getMinutes ( );
				var currentMinutesleadingzero = currentMinutes > 9 ? currentMinutes : '0' + currentMinutes; // If the number is 9 or below we add a 0 before the number.
				var currentDate = currentTime.getDate ( );

					var weekday = new Array(7);
					weekday[0] = "Söndag";
					weekday[1] = "Måndag";
					weekday[2] = "Tisdag";
					weekday[3] = "Onsdag";
					weekday[4] = "Torsdag";
					weekday[5] = "Fredag";
					weekday[6] = "Lördag";
				var currentDay = weekday[currentTime.getDay()];

					var actualmonth = new Array(12);
					actualmonth[0] = "Januari";
					actualmonth[1] = "Februari";
					actualmonth[2] = "Mars";
					actualmonth[3] = "April";
					actualmonth[4] = "Maj";
					actualmonth[5] = "Juni";
					actualmonth[6] = "Juli";
					actualmonth[7] = "Augusti";
					actualmonth[8] = "September";
					actualmonth[9] = "Oktober";
					actualmonth[10] = "November";
					actualmonth[11] = "December";
				var currentMonth = actualmonth[currentTime.getMonth ()];

    var currentTimeString = "<h1>" + currentHours + ":" + currentMinutesleadingzero + "</h1><h2>" + currentDay + " " + currentDate + " " + currentMonth + "</h2>";
    document.getElementById("clock").innerHTML = currentTimeString;
}, 1000);
	</script>
</head>
<body>
<div id="wrapper">
	<div id="upper-left">
		<!-- Including the date/time-script -->
		<h1></h1>
		<div id="clock"></div>
	</div>

	<div id="upper-right">
		<h2></h2>
		<!-- start tyska skolans matsedel -->
		<iframe src="http://mpi.mashie.se/public/menu/KK%20Brunnsgatan/7938CE10?old=True"></iframe>

	</div>
	<div id="lower-left">
			<div id="c_3350964eb97a313e6ee34fd39a366af6" class="normal">

				<script type="text/javascript" src="http://www.klart.se/widget/widget_loader/3350964eb97a313e6ee34fd39a366af6"></script>
	</div>
		</div>

	<div id="lower-right">
	<p>aftonbladet.se</p>
<?php // Code for getting the RSS-news-feed
			$rss = new DOMDocument();
			$rss->load('http://www.aftonbladet.se/nyheter/rss.xml'); // Specify the address to the feed
			$feed = array();
				foreach ($rss->getElementsByTagName('item') as $node) {
					$item = array (
					'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
					'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
					'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
					);
				array_push($feed, $item);
				}

		$limit = 3; // Number of posts to be displayed
			for($x=0;$x<$limit;$x++) {
				$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
				$description = $feed[$x]['desc'];
				$date = date('j F', strtotime($feed[$x]['date']));
				echo '<h2 class="smaller">'.$title.'</h2>';
				echo '<p class="date">'.$date.'</p>';
				echo '<p>'.strip_tags($description, '<p><b>').'</p><h2>...</h2>';
			}
		?>

		</div>


	<div id="bottom">
			<h3>
		<?php // Depending on the hour of the day a different message is displayed.
			$now = date('H');
				if (($now > 06) and ($now < 10)) echo 'Yippee en ny underbar morgon!';
				else if (($now >= 10) and ($now < 12)) echo 'Ha en bra dag!';
				else if (($now >= 12) and ($now < 14)) echo 'Dags för lunch!';
				else if (($now >= 14) and ($now < 17)) echo 'Kom och titta!';
				else if (($now >= 17) and ($now < 20)) echo 'Gjort läxorna ännu?';
				else if (($now >= 20) and ($now < 22)) echo 'Dax att sova!!!';
				else if (($now >= 22) and ($now < 23)) echo 'Shh jag ska sova nu..';
				else if (($now >= 00) and ($now < 06)) echo 'Shh, jag sover...';
			?>
		</h3>
	</div>
</div>
</body>
</html>

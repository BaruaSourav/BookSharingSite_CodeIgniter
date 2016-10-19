<html>
	
	<h1>Test Success - Login (the designed Dashboard_view will be used here)</h1>
	<p style = "Color:blue"> Reference :mock name -user Dashboard<p>
	<?php 
		echo "Today is " . date("Y/m/d") . "<br>";
		echo "The time is " . date("h:i:sa");
		$now = new DateTime();
		$now->setTimezone(new DateTimeZone('Asia/Dhaka'));
		echo $now->format('g:i A');

	?>

</html>
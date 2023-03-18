<!DOCTYPE html>
<html>
<head>
	<title>3-1: PHP Basics</title>
	<script type="text/javascript">
		<?php
			// PHP array
			$languages = array('PHP', 'HTML', 'Javascript');
			
			// JavaScript array created using PHP loop
			echo "var langArray = [";
			foreach($languages as $lang) 
			{
				echo "'".$lang."',";
			}
			echo "];";
		?>

		// JavaScript script to display the array values
		window.onload = function() 
		{
			var output = "";
			for (var i = 0; i < langArray.length; i++) {
				output += langArray[i] + "<br>";
			}
			document.getElementById("lang-output").innerHTML = output;
		}
	</script>
</head>
<body>
	<?php
		//variables - yourName, number 1, number2, total
		$assignmentName = "3-1:PHP Basics";
		$yourName = "Jake Soulinthavong";
		$number1 = 4;
		$number2 = 11;
		$total = $number1 + $number2;

		echo "<h1>$assignmentName</h1>";
		echo "<h2>$yourName</h2>";
		echo "<p>Number 1: $number1 </p>";
		echo "<p>Number 2: $number2 </p>";
		echo "<p>Total: $total </p>";
	?>
	<p id="lang-output"></p>
</body>
</html>
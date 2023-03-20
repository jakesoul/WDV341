<!DOCTYPE html>
<html>
<head>
	<title>4-1: PHP Functions</title>
<html>
<head>
	<title>4-1: PHP Functions</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.5;
			margin: 0;
			padding: 0;
		}
		h4 {
			font-size: 1.2em;
			margin-top: 2em;
		}
		p {
			margin: 0 0 1em;
		}
		.container {
			background-color: lightyellow;
			border: 1px solid gray;
			padding: 10px;
			text-align: left;
		}
	</style>
</head>
<body>
<div class="container">
<h1>4-1: PHP Functions</h1>
<h2>Jake Soulinthavong</h2>
<?php

	// Variables
	$timestamp = strtotime("now");
	$input_string = "   Welcome to DMACC!   ";
	$phone_number = "1234567890";
	$currency_number = 123456;

	// Function formatting a timestamp of mm/dd/yyyy
	function format_date_us($timestamp) 
	{
		return date('m/d/Y', $timestamp);
	}

	// Function formatting a timestamp of dd/mm/yyyy
	function format_date_international($timestamp) 
	{
		return date('d/m/Y', $timestamp);
	}

	// Function that processes a string input
	function process_string($input_string) 
	{
		$trimmed_string = trim($input_string);
		$lowercase_string = strtolower($trimmed_string);
		$contains_dmacc = (stripos($lowercase_string, 'dmacc') !== false);
		$string_length = strlen($input_string);

		echo "a. Display the number of characters in the string: <strong>$string_length</strong><br>";
		echo "b. Trim any leading or trailing whitespace: <strong>$trimmed_string</strong><br>";
		echo "c. Display the string as all lowercase characters: <strong>$lowercase_string</strong><br>";
		echo "d. Will display whether or not the string contains &ldquo;DMACC&rdquo; either upper or lowercase: <strong>" . ($contains_dmacc ? "The string contains DMACC" : "The string contains DMACC") . "</strong><br>";
	}

	// Function formatting a phone number
	function format_phone_number($number) 
	{
		$formatted_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "($1) $2-$3", $number);
		echo "Formatted phone number: <strong>$formatted_number</strong><br>";
	}

	// Function formatting a number as US currency
	function format_currency($number) 
	{
		$formatted_currency = "$" . number_format($number, 2);
		echo "Formatted currency: <strong>$formatted_currency</strong><br>";
	}

	echo "<h4>1. Create a function that will accept a timestamp and format it into mm/dd/yyyy format: </h4><p>";
	echo format_date_us($timestamp) . "</p>";

	echo "<h4>2. Create a function that will accept a timestamp and format it into dd/mm/yyyy format to use when working with international dates.: </h4><p>";
	echo format_date_international($timestamp) . "</p>";

	echo "<h4>3. Create a function that will accept a string input.  It will do the following things to the string:</h4><p>";
	process_string($input_string);

	echo "<h4>4. Create a function that will accept a number and display it as a formatted phone number:</h4><p>";
	format_phone_number($phone_number);

	echo "<h4>5. Create a function that will accept a number and display it as US currency with a dollar sign:</h4><p>";
	format_currency($currency_number);

?>
</div>
</body>
</html>







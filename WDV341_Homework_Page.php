<html>

	<head>
		<link rel="stylesheet" href="../stylesheet.css">
		
		<title>WDV341 Homework Page</title>
		<meta charset="UTF-8">
		<meta name="author" content="Jake Soulinthavong">
		<meta name="description" content="WDV341, homework, assignments">
		
		<style>
		
			@import url('https://fonts.googleapis.com/css2?family=Piazzolla:wght@300&family=Sansita+Swashed&family=Teko:wght@500&display=swap');
			
			
			h1, button	{
				color: black;
				font-family: "Sansita Swashed", "comic sans ms";
			}
					
			
		</style>
	</head>


	<body>

		<h1>Jake Soulinthavong - WDV341 Homework Page</h1>

		<main>
			<button type="button" class="collapsible">Homework Assignments!</button>
			<div class="content">
				<p><a href="../index.html">Return to Home Page</a></p>

                <p><a href="https://github.com/jakesoul/WDV341">Github Repos</a></p>

				<p><a href="Unit_2/define_git_keywords.php">Unit 2 - Git Terms</a></p>

				<p><a href="Unit_3/PHP_Basics.php">Unit 3 - PHP Basics</a></p>

				<p><a href="Unit_4/PHP_Functions.php">Unit 4 - PHP Functions</a></p>

				<p><a href="Unit_5/inputForm.html">Unit 5 - HTML Form Processor</a></p>

				<p><a href="Email_Project/inputForm.html">Email Project - Contact Form with Email</a></p>
				<p><a href="Unit_7/selectEvents.php">Unit 7.1 - Create selectEvents.php</a></p>
				<p><a href="Unit_7/">Unit 7.2 - Create selectOneEvent.php</a></p>
				<p><a href="Unit_8/">Unit 8.1 - PHP Formatted Content</a></p>
				<p><a href="Unit_9/">Unit 9.1 - PHP JSON Event Object</a></p>
				<p><a href="Unit_10/">Unit 10 - Protect Form Processors</a></p>
				<p><a href="Unit_11/">Unit 11 - Self Posting Input Event form with INSERT</a></p>
				<p><a href="Unit_12/">Unit 12 - Create a form page for the events</a></p>
				<p><a href="Unit_13/">Unit 13.1 - Create event_user table</a></p>
				<p><a href="Unit_13/">Unit 13.2 - Create a login.php page</a></p>
				<p><a href="Unit_13/">Unit 13.3 - Create a logout.php page</a></p>
				<p><a href="Unit_14/">Unit 14 - Protect your dynamic pages</a></p>
				<p><a href="Unit_15/">Unit 15 - Create delete functionality</a></p>
				<p><a href="Unit_16/">Unit 16 - Create Update Form for an Event</a></p>
				<p><a href="Final_Project/">Final - Content Processing Application</a></p>

				<?php
                echo "<p> PHP Code: Hello world!</p>";
                ?>
			</div>
			
			
			<button type="button" class="collapsible">Penelope (Again)</button>
				<div class="content">
					<figure>
						<a href="images/nellie_valentines_day.jpg">
							<img src="images/nellie_valentines_day.jpg" height="439px" width="500px" alt="Jake's puppy, Nellie">
						</a>
						<figcaption>(Nellie, admiration post)</figcaption>
					</figure>
				</div>
		</main>
		
		<script>
			var coll = document.getElementsByClassName("collapsible");
			var i;

			for (i = 0; i < coll.length; i++) {
			coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.display === "block") {
			content.style.display = "none";
			} else {
		  content.style.display = "block";
					}
				});
			}
		</script>
		
		<footer>
			<p></p>
			<a class="gifContainer" href="images/6N3o.gif">
			<img src="images/6N3o.gif"></a>
				<!--
					https://gifer.com/en/6N3o
				-->
					
			<h4>&#169; 2020 All rights reserved. <a href="http://www.jakesoul.org/">www.jakesoul.org</a></h4>
			
		</footer>
	</body>
</html>
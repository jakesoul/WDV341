<?php
require '../Unit_7/dbConnect.php'; //connect to database
//require 'dbConnect_localmachineserverxampp.php'; //connect to database
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Online Library</title>
		<meta charset="utf-8">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="stylesheets/stylesheet.css">
		<style>
			.coverImage {
			width: 150px;
			height: 200px;
			object-fit: cover;
			}
			.titleLink {
			cursor: pointer;
			}
			.inStock {
			color: red;
			}
		</style>
		<script>
			var confirmButton = document.querySelector('.swal2-confirm');
			if (confirmButton) {
				confirmButton.textContent = 'Yes';
			}
			function promptUser(bookTitle, stockAvailability) {
				if (stockAvailability == 'Yes') {
					var response = confirm("Would you like to check out the book '" + bookTitle + "'?");
					if (response == true) {
						alert("Thank you for checking out the book!");
					}
				}
				else {
					alert("Sorry, the book '" + bookTitle + "' is out of stock.");
				}
			}
		</script>
	</head>

	<body>
		<header>
			<h1>Online Library</h1>
			<h4><em>Click on Contact Us to check out a book!</em></h4>
		</header>

		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Admin</a></li>
				<li><a href="contactForm.php">Contact Us</a></li>
			</ul>
		</nav>
	<div>

        <?php
            try 
            {
                // Variables
                $sql = "SELECT book_title, author, isbn, publisher, publication_date, genre, cover_image, page_number, format, CASE WHEN stock_availability = 0 THEN 'Yes'
				WHEN stock_availability = 1 THEN 'Out of Stock!'
				ELSE 'Unknown'
				END AS stock_availability from wdv341_online_library order by book_title asc";
                $stmt = $conn->prepare($sql); // Prepare an SQL SELECT statement to retrieve all events from the events table
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC); //set results as an associative array

				echo "<table>";
				echo "<thead><tr><th style='width: 10%;'>Cover</th><th style='width: 12.5%;'>Title</th><th style='width: 12.5%;'>Author</th><th style='width: 10%;'>ISBN</th><th style='width: 12.5%;'>Publisher</th><th style='width: 10%;'>Publication Date</th><th style='width: 12.5%;'>Genre</th><th style='width: 5%;'>Page Count</th><th style='width: 5%;'>Format</th><th style='width: 5%;'>On Shelf</th></tr></thead>";
								

				

                if ($stmt->rowCount() > 0) 
                {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
					{
						echo "<tr>";
						echo "<td class='titleLink' onMouseOver='this.style.cursor=\"pointer\"' onClick='promptUser(\"" . $row['book_title'] . "\", " . $row['stock_availability'] . ")'><img src='images/" . $row['cover_image'] . "' class='coverImage'></td>";
						echo "<td>" . $row['book_title'] . "</td>";
						echo "<td>" . $row['author'] . "</td>";
						echo "<td>" . $row['isbn'] . "</td>";
						echo "<td>" . $row['publisher'] . "</td>";
						echo "<td>" . $row['publication_date'] . "</td>";
						echo "<td>" . $row['genre'] . "</td>";
						echo "<td>" . $row['page_number'] . "</td>";
						echo "<td>" . $row['format'] . "</td>";
						if($row['stock_availability'] == 'Yes')
						{
							echo "<td>" . $row['stock_availability'] . "</td>";
						}
						else
						{
							echo "<td class='inStock'>" . $row['stock_availability'] . "</td>";
						}
						echo "</tr>";
					}
									
					echo "</table>";
                }
                else
                {
                    // If no rows were returned, display a message to the client
                    echo "<p>No books were found.</p>";
                }
            }
            catch (PDOException $e) 
            {
                // If an error occurs, display an error message to the client
                echo "<p>An error occurred while retrieving the event: " . $e->getMessage() . "</p>";
            }
        ?>
    </div>


		<footer>
			<p>Library App &copy;<?php echo date("Y"); ?> </p>
			<p><a href="http://www.jakesoul.org/">www.jakesoul.org</a></p>
		</footer>
	</body>
</html>

<?php
    session_start();  //join an existing session or start a new one if needed

    $validUser = false;
    $errMsg = "";

    if( isset($_POST['submit']) )
    { 
        $dbConnect = "../Unit_7/dbConnect.php";
        $dbConnect1 = 'dbConnect_localmachineserverxampp.php';
        $inUserName = $_POST['inUserName'];
        $inPassword = $_POST['inPassword'];

        require $dbConnect;

        $sql = "SELECT event_username, event_password FROM wdv_341_event_users WHERE event_username = :username AND event_password = :password";

        $stmt = $conn->prepare($sql);

        //bind parameters
        $stmt->bindParam(':username', $inUserName);
        $stmt->bindParam(':password', $inPassword);

        $stmt->execute(); //execute the sql statement

        //process the result - did the SELECT find a matching record??
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        //$row = $stmt->fetch();  //get a row of data
        $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        $numRows = count($resultArray);
        if($numRows == 1)
        {
            
            $_SESSION['validUser'] = true; //create a Session variable and assign a value
            $validUser = true;
            $_SESSION['username'] = $inUserName;
        }
        else
        {
            $errMsg = "Invalid username and password!";
        }

    }
    else
    {
        if( isset($_SESSION['validUser']) )
        {
            $dbConnect = "../Unit_7/dbConnect.php";
        $dbConnect1 = 'dbConnect_localmachineserverxampp.php';

        require $dbConnect;

        $sql = "SELECT event_username, event_password FROM wdv_341_event_users WHERE event_username = :username AND event_password = :password";

        $stmt = $conn->prepare($sql);

        //bind parameters
        $stmt->bindParam(':username', $inUserName);
        $stmt->bindParam(':password', $inPassword);

        $stmt->execute(); //execute the sql statement
            $validUser = true;      //tell the system to display Admin HTML
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Portal</title>
        <link rel="stylesheet" href="stylesheets/loginStylesheet.css">
        <style>
            
            .inStock {
                color: red;
            }
        </style>
    </head>
    <body>
    
    <?php

        if($validUser)
        {
        //display the admin html in the following area
    ?>
            <head>
                <link rel="stylesheet" href="stylesheets/stylesheet.css">
            </head>
            <h2>Hello, <?php echo $_SESSION['username']; ?>! </h2>
            <h3>Welcome to the Admin System</h3>
            <nav>
                <ul>
                    <li class="addBook"><a href="addBook.php">Add book</a></li>
                    <li><a href="index.php">Customer Page</a></li>
                    <li><a href="logout.php">Log Out</a></li>

                </ul>
		    </nav>
    <div>

        <?php
            try 
            {
                // Variables
                $sql = "SELECT id, book_title, author, isbn, publisher, publication_date, genre, cover_image, page_number, format, CASE WHEN stock_availability = 0 THEN 'Yes'
                WHEN stock_availability = 1 THEN 'No'
                ELSE 'Unknown'
                END AS stock_availability from wdv341_online_library order by book_title asc";
                $stmt = $conn->prepare($sql); // Prepare an SQL SELECT statement to retrieve all events from the events table
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC); //set results as an associative array

                echo "<table>";
                echo "<thead><tr><th style='width: 5%;'>Edit</th><th style='width: 5%;'>Terminate</th><th style='width: 8%;'>In Stock</th><th style='width: 10%;'>Cover</th><th style='width: 12.5%;'>Title</th><th style='width: 12.5%;'>Author</th><th style='width: 10%;'>ISBN</th><th style='width: 12.5%;'>Publisher</th><th style='width: 10%;'>Publication Date</th><th style='width: 8%;'>Genre</th><th style='width: 5%;'>Page Count</th><th style='width: 5%;'>Format</th></tr></thead>";
                
                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td><form method='POST' action='editBook.php'><input type='hidden' name='id' value='" . $row['id'] . "'><input type='submit' name='edit' value='Edit'></form></td>";
                        echo "<td><form method='POST' action='deleteBook.php'><input type='hidden' name='id' value='" . $row['id'] . "'><input type='submit' name='delete' value='Delete'></form></td>";
                        if ($row['stock_availability'] == 'Yes') {
                            echo "<td>" . $row['stock_availability'] . "</td>";
                        } else {
                            echo "<td class='inStock'>" . $row['stock_availability'] . "</td>";
                        }
                        echo "<td><img src='images/" . $row['cover_image'] . "' class='coverImage'></td>";
                        echo "<td>" . $row['book_title'] . "</td>";
                        echo "<td>" . $row['author'] . "</td>";
                        echo "<td>" . $row['isbn'] . "</td>";
                        echo "<td>" . $row['publisher'] . "</td>";
                        echo "<td>" . $row['publication_date'] . "</td>";
                        echo "<td>" . $row['genre'] . "</td>";
                        echo "<td>" . $row['page_number'] . "</td>";
                        echo "<td>" . $row['format'] . "</td>";

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
    <?php
        }
        else
        {
        //echo "Display Form";
        //display the login form in the following area
    ?>
        <head>

        </head>
        <h1>Admin Portal</h1>
        <nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Admin</a></li>
				<li><a href="contactForm.php">Contact Us</a></li>
			</ul>
		</nav>

        <form method="post" action="login.php">
            <p>
                <label for="inUserName">Username: </label>
                <input type="text" name="inUserName" id="inUserName" placeholder="Username">
                <span class="errorFormat"><?php echo $errMsg; ?></span>
            </p>
            <p>
                <label for="inPassword">Password: </label>
                <input type="password" name="inPassword" id="inPassword">
            </p>

            <p>
                <input type="submit" name="submit" value="Login">
                <input type="reset" name="button2" id="button2" value="Reset" />
            </p>

        </form>
        <footer>
			<p>Library App &copy;<?php echo date("Y"); ?> </p>
			<p><a href="http://www.jakesoul.org/">www.jakesoul.org</a></p>
		</footer>
    <?php
                    $stmt = $conn->prepare("UPDATE wdv341_online_library SET book_title = :book_title, author = :author, isbn = :isbn, publisher = :publisher, publication_date = :publication_date, genre = :genre, cover_image = :cover_image, page_number = :page_number, format = :format, stock_availability = :stock_availability WHERE id = :id");
                    $stmt->bindParam(':book_title', $bookTitle);
                    $stmt->bindParam(':author', $author);
                    $stmt->bindParam(':isbn', $isbn);
                    $stmt->bindParam(':publisher', $publisher);
                    $stmt->bindParam(':publication_date', $publicationDate);
                    $stmt->bindParam(':genre', $genre);
                    $stmt->bindParam(':cover_image', $coverImage);
                    $stmt->bindParam(':page_number', $pageNumber);
                    $stmt->bindParam(':format', $format);
                    $stmt->bindParam(':stock_availability', $stockAvailability);
                    $stmt->bindParam(':id', $bookID);
                    $stmt->execute();}
    ?>
  </body>

</html>


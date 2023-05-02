<?php
// Make sure the book ID is set
if (!isset($_POST['id'])) {
    header("Location: login.php");
    exit();
}

// Get the book ID
$bookID = $_POST['id'];
$bookTitle = $_POST['book_title'];

try {
    $dbConnect = "../Unit_7/dbConnect.php";
    $dbConnect1 = 'dbConnect_localmachineserverxampp.php';
    require $dbConnect;

    $sql = "SELECT id, book_title, author, isbn, publisher, publication_date, genre, cover_image, page_number, format, CASE WHEN stock_availability = 0 THEN 'Yes'
                WHEN stock_availability = 1 THEN 'No'
                ELSE 'Unknown'
                END AS stock_availability from wdv341_online_library order by book_title asc";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $bookID);
    $stmt->execute();
    $book = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$book) {
        header("Location: login.php");
        exit();
    }

    if (isset($_POST['save_changes'])) {
        try {
            // Connect to the database
            $dbConnect = "../Unit_7/dbConnect.php";
            $dbConnect1 = 'dbConnect_localmachineserverxampp.php';
            require $dbConnect1;
    
            // Update the book information in the database
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
            $stmt->execute();
    
            // Close the database connection
            $conn = null;
    
            // Redirect to the login page
            header("Location: login.php");
            exit();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link rel="stylesheet" href="stylesheets/stylesheet.css">
    <link rel="stylesheet" href="stylesheets/contactStylesheet.css">
</head>
<body>
    <h1>Edit Book</h1>

    <form method="POST" action="editBook.php">
        <input type="hidden" name="id" value="<?php echo $bookID; ?>">

        <!-- Add form fields for editing the book information -->
        <label for="book_title">Book Title:</label>
        <input type="text" name="book_title" id="book_title" value="<?php echo $bookTitle['book_title']; ?>"><br>

        <label for="author">Author:</label>
        <input type="text" name="author" id="author" value="<?php echo $author['author']; ?>"><br>

        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" id="isbn" value="<?php echo $isbn['isbn']; ?>"><br>

        <label for="publisher">Publisher:</label>
        <input type="text" name="publisher" id="publisher" value="<?php echo $publisher['publisher']; ?>"><br>

        <label for="publication_date">Publication Date:</label>
        <input type="date" name="publication_date" id="publication_date" value="<?php echo $publicationDate['publication_date']; ?>"><br>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" value="<?php echo $genre['genre']; ?>"><br>

        <label for="cover_image">Cover Image:</label>
        <input type="text" name="cover_image" id="cover_image" value="<?php echo $bcoverImageok['cover_image']; ?>"><br>

        <label for="page_number">Page Number:</label>
        <input type="number" name="page_number" id="page_number" value="<?php echo $pageNumber['page_number']; ?>"><br>

        <label for="format">Format:</label>
        <input type="text" name="format" id="format" value="<?php echo $format['format']; ?>"><br>

        <label for="stock_availability">Stock Availability:</label>
        <select name="stock_availability" id="stock_availability">
            <option value="0" <?php if ($book['stock_availability'] == 0) echo "selected"; ?>>Yes
            </option>
            <option value="1" <?php if ($book['stock_availability'] == 1) echo "selected"; ?>>No</option>
        </select><br>
        <input type="submit" name="save_changes" value="Save Changes">
    <input type="button" value="Cancel" onclick="window.location.href='login.php'">
</form>
</body>
</html>
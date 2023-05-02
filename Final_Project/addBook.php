<?php
require '../Unit_7/dbConnect.php'; //connect to database
//require 'dbConnect_localmachineserverxampp.php'; //connect to database

// If the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the form data
    $errors = [];

    if (empty($_POST['book_title'])) {
        $errors[] = "Book title is required.";
    }

    if (empty($_POST['author'])) {
        $errors[] = "Author is required.";
    }

    if (empty($_POST['isbn'])) {
        $errors[] = "ISBN is required.";
    }

    if (empty($_POST['publisher'])) {
        $errors[] = "Publisher is required.";
    }

    if (empty($_POST['publication_date'])) {
        $errors[] = "Publication date is required.";
    }

    if (empty($_POST['genre'])) {
        $errors[] = "Genre is required.";
    }

    if (empty($_POST['page_number'])) {
        $errors[] = "Page count is required.";
    }

    if (empty($_POST['format'])) {
        $errors[] = "Format is required.";
    }

    if (!empty($_FILES['cover_image']['name'])) {
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $file_info = pathinfo($_FILES['cover_image']['name']);
        $file_extension = strtolower($file_info['extension']);

        if (!in_array($file_extension, $allowed_extensions)) {
            $errors[] = "Invalid file type for cover image. Allowed types are: " . implode(', ', $allowed_extensions) . ".";
        }
    }

    if (count($errors) > 0) {
        // Display errors and don't add book to database
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    } else {
        // Add the book to the database
        $book_title = $_POST['book_title'];
        $author = $_POST['author'];
        $isbn = $_POST['isbn'];
        $publisher = $_POST['publisher'];
        $publication_date = $_POST['publication_date'];
        $genre = $_POST['genre'];
        $page_number = $_POST['page_number'];
        $format = $_POST['format'];
        $stock_availability = isset($_POST['stock_availability']) ? 0 : 1;

        // Upload cover image, if provided
        $cover_image = null;
        if (!empty($_FILES['cover_image']['name'])) {
            $cover_image = uniqid() . '_' . $_FILES['cover_image']['name'];
            move_uploaded_file($_FILES['cover_image']['tmp_name'], 'images/' . $cover_image);
        }

        $sql = "INSERT INTO wdv341_online_library (book_title, author, isbn, publisher, publication_date, genre, page_number, format, stock_availability, cover_image)
                VALUES (:book_title, :author, :isbn, :publisher, :publication_date, :genre, :page_number, :format, :stock_availability, :cover_image)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':book_title', $book_title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':isbn', $isbn);
        $stmt->bindParam(':publisher', $publisher);
        $stmt->bindParam(':publication_date', $publication_date);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':page_number', $page_number);
        $stmt->bindParam(':format', $format);
        $stmt->bindParam(':stock_availability', $stock_availability);
        $stmt->bindParam(':cover_image', $cover_image);
        if ($stmt->execute()) 
        {
            // Redirect user to login page
            header('Location: login.php');
            echo "<p>Book added successfully!</p>";
            exit();
        } else 
        {
            echo "<p>Error adding book to database.</p>";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
    <link rel="stylesheet" href="stylesheets/stylesheet.css">
    <link rel="stylesheet" href="stylesheets/contactStylesheet.css">
</head>
<body>
    <h1>Add Book</h1>
    <form method="post" enctype="multipart/form-data">
        <label for="book_title">Book Title:</label>
        <input type="text" name="book_title" id="book_title" required><br><br>
        <label for="author">Author:</label>
    <input type="text" name="author" id="author" required><br><br>

    <label for="isbn">ISBN:</label>
    <input type="text" name="isbn" id="isbn" required><br><br>

    <label for="publisher">Publisher:</label>
    <input type="text" name="publisher" id="publisher" required><br><br>

    <label for="publication_date">Publication Date:</label>
    <input type="date" name="publication_date" id="publication_date" required><br><br>

    <label for="genre">Genre:</label>
    <input type="text" name="genre" id="genre" required><br><br>

    <label for="page_number">Page Count:</label>
    <input type="number" name="page_number" id="page_number" required><br><br>

    <label for="format">Format:</label>
    <select name="format" id="format" required>
        <option value="">Select a format</option>
        <option value="Hardcover">Hardcover</option>
        <option value="Paperback">Paperback</option>
        <option value="Ebook">Ebook</option>
    </select><br><br>

    <label for="stock_availability">In Stock:</label>
    <input type="checkbox" name="stock_availability" id="stock_availability" value="0"><br><br>

    <label for="cover_image">Cover Image:</label>
    <input type="file" name="cover_image" id="cover_image"><br><br>

    <input type="submit" value="Add Book">
    <input type="submit" value="Cancel" onclick="window.location.href='login.php'">
</form>
</body>
</html>
<?php
// Make sure the book ID is set
if (!isset($_POST['id'])) {
    header("Location: login.php");
    exit();
}

// Get the book ID
$bookID = $_POST['id'];

try {
    $dbConnect = "../Unit_7/dbConnect.php";
    $dbConnect1 = 'dbConnect_localmachineserverxampp.php';
    require $dbConnect;

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM wdv341_online_library WHERE id = :id");

    // Bind the parameter
    $stmt->bindParam(':id', $bookID, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Redirect back to the index page
    header("Location: login.php");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

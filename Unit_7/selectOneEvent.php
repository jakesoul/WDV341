<?php
require 'dbConnect.php'; //connect to database
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid black;
            background-color: white;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid black;
        }

        th {
            background-color: lightgrey;
        }

        body {
            background-color: burlywood;
        }
    </style>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>7-2: Create selectOneEvent.php - Jake Soulinthavong</h2>
    <p>
        <?php
            try 
            {
                // Variables
                $name = 'WDV341 Intro PHP';
                $sql = "SELECT name, description, presenter, date, time, date_inserted, date_updated from wdv341_events WHERE name = :name";
                $stmt = $conn->prepare($sql); // Prepare an SQL SELECT statement to retrieve all events from the events table
                $stmt->bindParam(':name', $name);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC); //set results as an associative array

                // Validate if one row was found
                if ($stmt->rowCount() > 0) 
                {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                    {
                        // Format the row from the result into a table
                        echo "<table>";
                        echo "<thead><tr><th>Name</th><th>Description</th><th>Date</th><th>Time</th><th>Date Inserted</th><th>Date Updated</th></tr></thead>";
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['time'] . "</td>";
                        echo "<td>" . $row['date_inserted'] . "</td>";
                        echo "<td>" . $row['date_updated'] . "</td>";
                        echo "</tr>";
                        echo "</tbody>";
                        echo "</table>";
                    }
                }
                else
                {
                    // If no rows were returned, display a message to the client
                    echo "<p>No events were found.</p>";
                }
            }
            catch (PDOException $e) 
            {
                // If an error occurs, display an error message to the client
                echo "<p>An error occurred while retrieving the event: " . $e->getMessage() . "</p>";
            }
        ?>
    </p>
</body>
</html>
<?php
    //Most APIs that return JSON formatted content will not need any HTML

    //Pull the events from the database
    //format them into a PHP objefct using the Event class
    //convert the PHP object into a JSON formatted object json
    //return/echo the JSON object to the Response Object and then back to the browser for processing

    require "Event.php";   //get the class

    try
    {
        require 'dbConnect.php'; //connect to database
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = "SELECT name, description, presenter, date, time FROM wdv341_events WHERE name = 'WDV341 Intro PHP'"; // set the PDO error mode to exception
        $stmt = $conn->prepare($sql); // Prepare an SQL SELECT statement to retrieve all events from the events table
        
        // bind any parameters, if any
        $stmt->execute(); //the $stmt will CATCH the returned result-set/object
        $stmt->setFetchMode(PDO::FETCH_ASSOC); //set result as an associative array

        $row = $stmt->fetch();  //get one row of events into the $row array

        $outputObj = new Event();

        $outputObj->eventName = $row['name'];
        $outputObj->eventDescription = $row['description'];
        $outputObj->eventPresenter = $row['presenter'];
        $outputObj->eventDate = $row['date'];
        $outputObj->eventTime = $row['time'];

        echo "<p>";
        echo json_encode($outputObj); //convert to JSON format and then echo to Response
        echo "</p>";
    }
    catch (PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }


?>
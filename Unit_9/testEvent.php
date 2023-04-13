<?php
    /*
        This program will test the Event class
    */

    include "Event.php";    //access the class file

    $eventObject = new Event(); //instantiation command using the event class
    //create a new object based on the Event class

    $eventObject->set_eventName("WDV341");
    echo "Event Name: ".$eventObject->get_eventName();

    $eventObject->eventDescription = "Introduction to PHP Programming for web applications.";
    echo "<p></p>";
    echo "Event Description: ".$eventObject->eventDescription;

    //JSON output
    echo "<p></p>";
    $JSONEventObject = json_encode($eventObject);
    echo $JSONEventObject;
?>
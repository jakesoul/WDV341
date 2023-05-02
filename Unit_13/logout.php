<?php
    //close the session
    session_unset();
    session_destroy();

    //close the DB
    $conn = null;       //close the connection object when you sign off
    //redirect to the application home page/login page
    header("Location: login.php"); //HEADERS ALWAYS NEED TO BE ABOVE HTML CODE

?>
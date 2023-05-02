<?php
    $validForm = true;
    $numberError = "";
    $numberOfItems = "";

    if( isset($_POST['submit']))
    {
        echo "<h3>Your Form has Been Submitted</h3>";

        //$numberOfItems = $_POST['numberOfItems']; //process form data

        if( is_numeric($numberOfItems))
        {
            $numberError = "";
        }
        else
        {
            $numberError = "Please enter a number";
            $validForm = false; //error found. Form becomes invalid
        }

        if( $validForm)
        {
            /*
                connect to the database - include dbConnect.php
                create the SQL command - SQL INSERT
                prepare the statement
                bind the parameters for all the input values/fields
                execute the statement
                create and display confirmation page
            */
        }
        else
        {

        }
    }
    else
    {

    }
    
    //Validation Algorithm
        //validate each field
            //if an error is found
                //display the error message
                //set validForm = false //flag for the form good/bad

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>

    <style>
        .errorMsg {color: red;}
    </style>
  </head>
  <body>
    <h1>WDV34 Intro PHP</h1>
    <h2>Self Posting Form Example</h2>


  </body>
</html>
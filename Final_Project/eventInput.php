<?php
    session_start();
    if( isset($_SESSION['validUser']))
    {
        echo "Valid User Show the page";
    }
    else
    {
        echo "Bad User";
        header('Location: login.php'); //redirect unwanted users to the login page
    }
    //flag or switch variable - it tells us whether or not you submit the form
    $formRequested = true;

    if( isset($_POST['submit']))
    {
        $formRequested = false;
    }
    else
    {

    }
?>
    <html>
    <head>
        <title>
            WDV341 Self Posting Form - Event Input
        </title>
    </head>
    <body>
        <h1>WDV341 Intro PHP</h1>
        <h2>Self Posting Form - Event Input</h2>
<?php
    if($formRequested)
    {
        echo "This is the Form";
?>
        <form method="post" action="selfPostingForm1.php">
        <p>
        <input type="submit" name="submit" value="Submit">
        <input type="reset"/>
        </p>
<?php
    }
    else
    {
?>
    <h3>Thank You!</h3>
    <p>Your event has been added to the database. Please check your new event in the Display Events process.</p>

<?php
    }
    
?>
    </body>
    </html>
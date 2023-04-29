<?php
    function submitDate()  {               
        $date = date("m/d/y");              
        return $date;                       
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        if (!empty($_POST['honeyPot'])) 
        {
            exit();
        }

        $firstName = $_POST['first-name'];
        $lastName = $_POST['last-name'];
        $phoneNumber = $_POST['phone-number'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        include "email_template.php";
    }
    else
    {
        // Form was not submitted successfully, send an email to notify
        include "notify_contact.php";
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Newsletter Sign Up Confirmation</title>
  </head>
  <body>
        <h1>Sign Up Form - Response</h1>
        <p>
            <?php echo "Thank you, $firstName $lastName!<br>"; ?>
        </p>
        <p>
            <?php echo "A signup confirmation has been sent to $email. Thank you for your support!<br>"; ?>
        </p>
  </body>
</html>

<?php
    include "email_template.php";
    include "notify_contact.php";

    // Variables
    $customer_name = $_POST["customer_name"];
    $customer_email = $_POST["customer_email"];
    $contact_reason = $_POST["contact_reason"];
    $message_section = $_POST["message"];

    // Functions
    function submitDate()  {               
        $date = date("m/d/y");              
        return $date;                       
    }

?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Response to Library Contact Form</title>
<link rel="stylesheet" href="../contactStylesheet.css">

<style>
    body
    {
        background-color: #333;
    }
    .boxclass {
        width:840px;
        margin:auto;    
        padding: 10px; 
        font-family: 'Arial', sans-serif;
        font-size:larger;
        background-color: white;
        border-style:solid;
        border-width: thin;
        border-color: black;
    }

    h1, h2  {
        text-align: center;
    }

    @media only screen and (max-width: 1000px) {
        form {
            width:90%;
        }
    }

</style>
</head>

<body>
    <div class="boxclass">
        <h2>
        Response to Library Contact Form
        </h2>
        <p>
            Hello <?php echo $customer_name , ","; ?>
        </p>

        <p>
            Thank for you for your interest in the your local library. You contacted us on <?php echo submitDate(); ?>.</p>
        <p>
            Your reason of contact is "<?php echo $contact_reason; ?>".
        </p>

        <p>
            Based upon your responses we will provide the following information in our confirmation email to you at <strong><?php echo $customer_email; ?></strong>.
        </p>

        <p>
            You have shared the following message which we will review:
        </p>

        <p>
            "<?php echo $message_section ?>"
        </p>

        <p>
            You will recieve a confirmation email shortly. Your input is greatly appreciated.
        </p>

        <p>
            Sincerely,
        </p>
            
        <p>Jake Soulinthavong
        </p>

        <p><a href='index.php'>Back to Home Page</p>
    </div>
</body>
</html>
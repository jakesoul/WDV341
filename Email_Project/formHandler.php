<?php
    include "email_template.php";
    include "notify_contact.php";

    // Variables
    $customer_name = $_POST["customer_name"];
    $customer_email = $_POST["customer_email"];
    $contact_reason = $_POST["contact_reason"];
    $comments_section = $_POST["comments"];

    // Functions
    function submitDate()  {               
        $date = date("m/d/y");              
        return $date;                       
    }

?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Response to Tattoo Shop Contact Form</title>
<style>

    body  {
        font-family: 'Arial', sans-serif;
        background-color: #54a181;
    }
    
    .boxclass {
        width:840px;
        background-color:#dcf0ea;
        margin:auto;    
        padding: 10px; 
        font-family: 'Arial', sans-serif;
        font-size:larger;
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
            Response to Tattoo Shop Contact Form
        </h2>
        <p>
            Hello <?php echo $customer_name , ","; ?>
        </p>

        <p>
            Thank for you for your interest in our tattoo shop. You contacted us on <?php echo submitDate(); ?>.</p>
        <p>
            Your reason of contact is "<?php echo $contact_reason; ?>".
        </p>

        <p>
            Based upon your responses we will provide the following information in our confirmation email to you at <strong><?php echo $customer_email; ?></strong>.
        </p>

        <p>
            You have shared the following comments which we will review:
        </p>

        <p>
            "<?php echo $comments_section ?>"
        </p>

        <p>
            You will recieve a confirmation email shortly. Your input is greatly appreciated.
        </p>

        <p>
            Sincerely,
        </p>
            
        <p>Jake Soulinthavong
        </p>

        <p>
            <?php echo ($send ? "Mail sent" : "No email sent"); ?>
        </p>
    </div>
</body>
</html>
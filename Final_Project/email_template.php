<?php  
    // Variables for email content
    $to = $_POST["customer_email"];  
    $subject = "Library Request - Your form was succesfully submitted";
    $message = "
   
    <html>
    <head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>Response to Online Library Contact Form</title>
    <style>
    
        body  {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
        }
        
        .boxclass {
            width:840px;
            background-color: white;
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
        <div class='boxclass'>
            <h2>
            Response to Online Library Contact Form
            </h2>
            <p>
                Hello " . $_POST['customer_name'] . ",
            </p>
    
            <p>
                Thank for you for your interest in our tattoo shop. You contacted us on " . submitDate() . ".</p>
            <p>
                Your reason of contact is " . $_POST['contact_reason'] . ".
            </p>
    
            <p>
                Based upon your responses we will provide the following information in our confirmation email to you at <strong>" . $_POST['customer_email'] . "</strong>.
            </p>
    
            <p>
                You have shared the following message which we will review:
            </p>
    
            <p>
            " . $_POST['message'] . "
            </p>
    
            <p>
                This email is confirmation that you have successfully submitted your request. Your input is greatly appreciated.
            </p>
    
            <p>
                Sincerely,
            </p>
                
            <p>Jake Soulinthavong
            </p>
    
        </div>
    </body>
    </html>";
    $headers = "From: Jake Soul <testemailaccount@jakesoul.org>" . "\r\n";   
    $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";



    $send = mail($to, $subject, $message, $headers);                          
  
?>
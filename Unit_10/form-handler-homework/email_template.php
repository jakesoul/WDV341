<?php  
    // Variables for email content
    $to = $_POST["email"];  
    $subject = "Newsletter - Your form was succesfully submitted";
    $message = "
   
    <html>
    <head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>Response to Sign Up Form</title>
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
        <div class='boxclass'>
            <h2>
                Response to Newsletter Sign Up Form
            </h2>
            <p>
                Hello " . $_POST['first-name'] . ",
            </p>
    
            <p>
                Thank for you for your interest in our newsletter. You contacted us on " . submitDate() . ".</p>
    
            <p>
                This email is confirmation that you have successfully submitted your request to sign up for our newsletter. This is the information we received:
            </p>

            <p>
                First Name: " . $_POST['first-name'] . "</br>
                Last Name: " . $_POST['last-name'] . "</br>
                Phone Number: " . $_POST['phone-number'] . "</br>
                Email: " . $_POST['email'] . "</br>
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
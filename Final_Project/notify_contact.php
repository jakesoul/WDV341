t<?php
    $tableList = "";                        
    
    foreach($_POST as $key => $value)  {
        $tableList .= $key . ": <p>";		    
        $tableList .= $value . "</p>";	                                       
    }

    $to = "mythicalpickle6@gmail.com";    
    
    $subject = "You have recieved a contact request";     
    
    $message = submitDate() . 
        "<p>
            Hello Jake,
        </p> 
        <p>
            You have a new contact form request. 
        </p>
        <p>
            Information collected: 
        </p>"
        . $tableList . "
        <p> 
            Please respond to the contact with 48 hours.  Thank you. 
        </p>
        <p>
            From, 
        </p> 
        <p>
            testemailaccount@jakesoul.org
        </p>";
    
    $headers = "From: Jake Soul <testemailaccount@jakesoul.org>" . "\r\n";   
    $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";  

    mail($to,$subject,$message,$headers); 
  
?>
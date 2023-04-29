<?php
    $tableList = "";                        
    
    foreach($_POST as $key => $value)  {
        $tableList .= $key . ": <p>";		    
        $tableList .= $value . "</p>";	                                       
    }

    $to = "mythicalpickle6@gmail.com";    
    
    $subject = "ALERT: There was a bot request";     
    
    $message = 'A bot attempted to access the form at ' . $_SERVER['REQUEST_URI'] . ' on ' . submitDate();
    
    $headers = "From: Jake Soul <testemailaccount@jakesoul.org>" . "\r\n";   
    $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";  

    mail($to,$subject,$message,$headers); 
  
?>
<?php
    
    $dateInserted = currentDateUSFormat();
    $dateUpdated = currentDateUSFormat();

    function currentDateUSFormat()
    {
        $date = date_default_timezone_set("America/Chicago");   
        $date = date("m/d/Y");                                   
        return $date;                                           
    }
    
    function currentDateSqlFormat()
    {
        $date = date_default_timezone_set("America/Chicago");   
        $date = date("Y-m-d");                                  
        return $date;                                           
    }

    if(isset($_POST['submit']))
    {

        // honeypot validation
        $host = $_POST['events_message'];
        if(!empty($host))
        {
            exit();  
        }
        else
        {
            $eventName = $_POST['name'];
            $eventDescription = $_POST['description'];
            $eventPresenter = $_POST['presenter'];
            $eventDate = $_POST['date'];
            $eventTime = $_POST['time'];
            $eventDateInserted = currentDateSqlFormat();
            $eventDateUpdated = currentDateSqlFormat();
            
            try 
            {       
                require '../Unit_7/dbConnect.php';	
            
                $sql = "INSERT INTO wdv341_events (";   
                $sql .= "name, ";
                $sql .= "description, ";
                $sql .= "presenter, ";
                $sql .= "date, ";
                $sql .= "time, ";
                $sql .= "date_inserted, ";
                $sql .= "date_updated ";
                $sql .= ") VALUES (";                   
                $sql .= ":eventName, ";
                $sql .= ":eventDescription, ";
                $sql .= ":eventPresenter, ";
                $sql .= ":eventDate, ";
                $sql .= ":eventTime, ";
                $sql .= ":eventDateInserted, ";
                $sql .= ":eventDateUpdated)";
                
                $stmt = $conn->prepare($sql);
                
                $stmt->bindParam(':eventName', $eventName);
                $stmt->bindParam(':eventDescription', $eventDescription);		
                $stmt->bindParam(':eventPresenter', $eventPresenter);		
                $stmt->bindParam(':eventDate', $eventDate);		
                $stmt->bindParam(':eventTime', $eventTime);
                $stmt->bindParam(':eventDateInserted', $eventDateInserted);
                $stmt->bindParam(':eventDateUpdated', $eventDateUpdated);		
                
                $stmt->execute();	   
            }
            
            catch(PDOException $e)
            {
                $message = "There was an error processing your request. A System administrator has been contacted. Please try again later.";
                error_log($e->getMessage());			
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatable" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Add Event Page</title>
        
        <style>
            body  {
                font-family: 'Arial', sans-serif;
                background-color: #54a181;
            }

            h1, h2  {
                text-align: center;
            }

            form  {
                width:840px;
                background-color:#dcf0ea;
                margin:auto;    
                padding: 20px; 
                font-family: 'Arial', sans-serif;
                font-size:larger;
                border-style:solid;
                border-width: thin;
                border-color: black;
            }

            form legend	 {
                font-size:larger;
                text-align:center;
            }

            input[type="text"], input[type="email"], textarea, select  {
                background-color: #fff;
                color: #000;
                width: 50%;
                width:100%;
                font-family: 'Arial', sans-serif;
            }

            input[type="submit"], input[type="reset"]  {
                background-color:#506a6c;
                font-family: 'Arial', sans-serif;
                display: inline-block;
                border-radius: 4px;
                border: none;
                text-align: center;
                font-size: 14px;
                padding: 10px;
                width: 100px;
                color:#DCE2F0;
                cursor:pointer;
                opacity: 1.0;
                transition: 0.3s;
            }

            input[type="submit"]:hover, input[type="reset"]:hover {opacity: 0.7}

            a:link  {
                color:white;
            }

            a:visited  {
                color:white;
            }

            @media only screen and (max-width: 1000px) {
                form {
                    width:90%;
                }
            }

            .honeyPot
            {
                display:none;
            }
        </style>
    </head>

    <body>
        
        <h1 class="text-center">Add an Event</h1>
        
            <?php   
                if(isset($_POST['submit'])){

                    echo"<p><h3>Your event has been saved!</h3>
                            Event: $eventName<br>
                            Description: $eventDescription<br>
                            Presenter: $eventPresenter<br>
                            Time: $eventTime<br>
                            Date: $dateInserted<br>
                        </p>";
            
                }
                else{  
            ?>
            <form name="eventsForm" id="eventsForm" method="post" action="selfPostingForm.php">

                <div>
                    <label for="name">Event Name: </label>
                    <input type="text"  name="name" id="name">
                </div>

                <div>
                    <label for="description">Event Description: </label>
                    <input type="text"  name="description" id="description">
                </div>
                    
                <div>
                    <label for="presenter">Event Presenter: </label>
                    <input type="text"  name="presenter" id="presenter"> 
                </div>

                <div class="honeyPot">
                    <label for="events_message">Event Message: </label>
                    <input type="text"  name="events_message" id="events_message">
                </div>
                    
                <div>
                    <label for="date">Event Date: </label>
                    <input type="date"  name="date" id="date"> 
                </div>
                    
                <div>
                    <label for="time">Event Time: </label>
                    <input type="time"  name="time" id="time"> 
                </div>
                    
                <div>
                    <label for="date_inserted">Event Date Inserted: </label>
                    <input type="text"  name="date_inserted" id="date_inserted" value="<?php echo $dateInserted ?>" readonly> 
                </div>

                <div>
                    <label for="events_updated_date">Event Date Updated: </label>
                    <input type="text"  name="events_updated_date" id="events_updated_date" value="<?php echo $dateUpdated ?>" readonly> 
                </div>
                    
                <div class="text-center" style="padding:1.5%;">
                    <input type="submit" name="submit" id="submit" value="Submit">
                    <input type="reset" name="Reset" id="button" value="Clear Form">
                </div>
            </form>

    </body>

</html>
<?php
    }
?>
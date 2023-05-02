<?php
    session_start();  //join an existing session or start a new one if needed


    $errMsg = "";
    $validUser = false;

    if( isset($_POST['submit']))
    { 
      $dbConnect = "dbConnect_localmachineserverxampp.php";
      $inUserName = $_POST['inUserName'];
      $inPassword = $_POST['inPassword'];

      require $dbConnect;

      $sql = "SELECT event_username, event_password FROM wdv_341_event_users WHERE event_username = :username and event_password = :password";

      $stmt = $conn->prepare($sql);

      //bind parameters
      $stmt->bindParam(':username', $inUserName);
      $stmt->bindParam(':password', $inPassword);

      $stmt->execute(); //execute the sql statement

      //process the result - did the SELECT find a matching record??
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $row = $stmt->fetch();  //get a row of data

      if($row)
      {
        $validUser = true;
        $_SESSION['validUser'] = true; //create a Session variable and assign a value
      }
      else
      {
        $errMsg = "Invalid username and password!";
      }

    }
    else
    {
    }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <style>

      body  {
          font-family: 'Arial', sans-serif;
          background-color: #54a181;
      }

      h1, h2  {
          text-align: center;
      }

      form  {
          width:450px;
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

      .errorFormat
      {
        color: red;
      }
    </style>
  </head>
  <body>
    
    <?php

      if($validUser)
      {
        //display the admin html in the following area
    ?>
      <h2>Welcome to the Admin System</h2>
      <h3>You are signed as: <?php echo $inUserName; ?></h3>
      <ul><strong>Admin Options: </strong>
          <li><a href="formhandler">Enter new events</li>
          <li>Enter new event users</li>
          <li>Show Events List</li>
          <li>Update Events</li>
          <li>Delete Events</li>
          <li><a href="logout.php">Log Out</a></li>
      </ul>

    <?php
      }
      else
      {
        //echo "Display Form";
        //display the login form in the following area
    ?>
        <h1>Login Page</h1>
        <form method="post" action="login.php">
            <p>
                <label for="inUserName">Username: </label>
                <input type="text" name="inUserName" id="inUserName" placeholder="Username">
                <span class="errorFormat"><?php echo $errMsg; ?></span>
            </p>
            <p>
                <label for="inPassword">Password: </label>
                <input type="password" name="inPassword" id="inPassword">
            </p>

            <p>
                <input type="submit" name="submit" value="Login">
                <input type="reset" name="button2" id="button2" value="Reset" />
            </p>

        </form>
    <?php
      }
    ?>
  </body>

</html>
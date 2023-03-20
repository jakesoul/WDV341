<?php
    
    function checkMajor(){
        if ($_POST["selected_major"] == "")
		{
            echo "You have not selected a major.</br>";
        }
        else
		{
            echo "You have declared " . $_POST['selected_major'] . " as your major.<br>";
        }
    }

    function displayProgramInfo()
	{     
        if (isset($_POST["program_info"]) == 1)
		{
            echo "<li>" . $_POST["program_info"] . "</li>";
        }
    }

    function displayProgramAdvisor()
	{
        if (isset($_POST["program_advisor"]) == 1)
		{
            echo "<li>" . $_POST["program_advisor"] . "</li>";
        }
    }
    
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Basic Form Handler Example</title>
</head>

<body>

<p>Dear <?php echo $_POST["first_name"] , ","; ?></p>

<p>Thank for you for your interest in <?php echo $_POST["school_name"]; ?>.</p>

<p>We have you listed as a <?php echo $_POST["academic_standing"]; ?> starting this fall.</p>

<p>You have declared <?php echo $_POST["selected_major"]; ?> as your major.</p>

<p>Based upon your responses we will provide the following information in our confirmation email to you at <?php echo $_POST["customer_email"]; ?></p>

  <?php displayProgramInfo(); ?>
  <?php displayProgramAdvisor(); ?>

  <p>You have shared the following comments which we will review:</p>

  <p><?php echo $_POST["comments"] ?></p>

</p>
</body>
</html>
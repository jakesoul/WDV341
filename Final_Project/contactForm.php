<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Contact Form</title>
        <link rel="stylesheet" href="stylesheets/contactStylesheet.css">

    </head>

    <body>
        <h1>Contact Online Library</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Admin</a></li>
                <li><a href="contactForm.php">Contact Us</a></li>
            </ul>
        </nav>

        <main>
        <form id="form1" name="form1" method="post" action="formHandler.php">
            <legend><strong>Welcome!</strong></legend>
            <p><em>Have a question? Fill out this form and we will get back to you as soon as possible.</em></p>
            <p>
                <label for="customer_name" >Full Name:</label> 
                <input type="text" name="customer_name" id="customer_name" placeholder="Enter your full name"/>
            </p>
            <p>
                <label for="customer_email">Email Address:</label> 
                <input type="email" name="customer_email" id="customer_email" placeholder="Enter your email address"/>
            </p>
            <p>
                <label for="contact_reason">Reason for Contact:</label> 
                <select name="contact_reason" id="contact_reason">
                    <option value="" selected disabled hidden>Choose a selection</option>
                    <option value="Book Request">Book Request</option>
                    <option value="Question">Question</option>
                    <option value="Feedback">Feedback</option>
                    <option value="Report Problem">Report Problem</option>
                    <option value="Other (Explain in Message section)">Other (Explain in Message section)</option>
                </select>
            </p>
            <p>
                <label for="message">Message:</label> 
                <textarea name="message" id="message" rows="5" cols="30" placeholder="Enter message here"></textarea>
            </p>
            <p>
                <input type="submit" name="button" id="button" value="Submit" />
                <input type="reset" name="button2" id="button2" value="Reset" />
            </p>
        </form>
        </main>
        <footer>
			<p>Library App &copy;<?php echo date("Y"); ?> </p>
			<p><a href="http://www.jakesoul.org/">www.jakesoul.org</a></p>
		</footer>
    </body>

</html>

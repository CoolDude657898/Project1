<html>
    <head>
        <title>Submitted</title>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <a href="datapage.php">View all results of form from everyone who took it</a>
        
        <?php
            include "validation.php";

            $global_password = "\$2y\$10\$ccqRtReEc0Aaqc9HV2CtA.xsz4fnRdKy54Ox5x4zX/RYsWQLYnkwy";
            $valid_password = checkPassword($global_password);

            if ($valid_password == TRUE){
                require('dbconfig.php');
                $db = connectDB();

                $data = sanitizeAllData();
                $email = $data["email"];
                $age = $data["age"];
                $recommendation = $data["recommendation"];
                $gender = $data["gender"];
                $times_purchased = $data["times_purchased"];
                $feedback = $data["feedback"];

                $prepared_statement = $db->prepare("INSERT INTO pepsi_survey (email, age, gender, times_purchased, recommendation, feedback) VALUES (?, ?, ?, ?, ?, ?);");
                $prepared_statement->execute(array($email, $age, $gender, $times_purchased, $recommendation, $feedback));
                echo "<p>Your survey has been submitted! Thank you for taking time to take this survey. We value your feedback!</p>";
            } else {
                echo "<p>Invalid Password</p>";
                return FALSE;  
            }
        ?>
    </body>
</html>
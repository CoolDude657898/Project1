<html>
    <head>
        <title>Submitted</title>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>

        <?php
            include "validation.php";

            $global_password = "\$2y\$10\$ccqRtReEc0Aaqc9HV2CtA.xsz4fnRdKy54Ox5x4zX/RYsWQLYnkwy";
            $valid_password = check_password($global_password);

            if ($valid_password == TRUE){
                sanitize_all_data();
                echo "<p>Your survey has been submitted! Thank you for taking time to take this survey. We value your feedback!</p>";
            } else {
                echo "<p>Invalid Password</p>";
                return FALSE;  
            }
        ?>
    </body>
</html>
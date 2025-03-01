<?php
    $global_password = "\$2y\$10\$ccqRtReEc0Aaqc9HV2CtA.xsz4fnRdKy54Ox5x4zX/RYsWQLYnkwy";

    /*
    Inputs tested with check_password()

    Correct password: This password was tested to ensure that it accepted the correct password
    An incorrect password: This password was tested to ensure that it rejected a wrong password
    */
    function check_password($hash){
        if (password_verify($_POST["password"], $hash)){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
    Inputs tested with validate_email()

    testemail@gmail.com: This was chosen to ensure that it accepted a valid email
    testemail@gmail: This was chosen to ensure that it did not accept a format without the .com (or other similar like .net)
    */
    function validate_email($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Valid email";
        } else {
            echo "Invalid email";
        }
    }

    $valid_password = check_password($global_password);

    if ($valid_password == TRUE){
        validate_email($_POST["email"]);
    } else {
        return FALSE;  
    }
?>
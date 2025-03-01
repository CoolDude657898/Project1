<?php
    $global_password = "\$2y\$10\$ccqRtReEc0Aaqc9HV2CtA.xsz4fnRdKy54Ox5x4zX/RYsWQLYnkwy";

    /*
    Inputs tested with check_password()

    Correct password: This password was tested to ensure that it accepted the correct password
    An incorrect password: This password was tested to ensure that it rejected a wrong password
    */
    function check_password($hash){
        if ($hash != NULL){
            if (password_verify($_POST["password"], $hash)){
                return TRUE;
            } else {
                return FALSE;
            }
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

    /*
    Inputs tested with validate_radio_buttons()
    All radio buttons in the age & pepsi recommendation fieldsets were tested to ensure that each one was allowed through
    Then through inspect element I changed one of the values and submitted it to ensure it would not get let through
    */
    function validate_radio_buttons($value){
        $valid_radio_buttons_age = array("0-12", "13-17", "18-22", "23-27", "28-32", "33-37", "38-42", "43-47", "48-52", "53-57", "58-62", "63-67", "68+");
        $valid_radio_buttons_recommendation = array("very-unlikely", "unlikely", "unsure", "likely", "very-likely");
        if ($value != NULL && (in_array($value, $valid_radio_buttons_age) || in_array($value, $valid_radio_buttons_recommendation))){
            echo "Valid radio button input";
        } else {
            echo "Invalid radio button input";
        }
    }

    /*
    Inputs tested with validate_options()
    All options in the gender group were tested to ensure they are allowed to be passed through
    A value was changed in inspect element to make sure that this function rejected any ones that are not in the array
    */
    function validate_options($value){
        $valid_options_gender = array("male", "female", "nonbinary", "genderfluid", "agender", "other");
        if ($value != NULL && in_array($value, $valid_options_gender)){
            echo "Valid option input";
        } else {
            echo "Invalid option input";
        }
    }

    /* 
    Inputs tested with validate_numbers()
    213: This input was tested to ensure numbers were allowed through
    The following inputs were tested by changing the input type in inspect element to ensure no non numbers were allowed through:
    2_13
    213$a
    $a
    */
    function validate_numbers($value){
        if (is_numeric($value)){
            echo "Valid number input";
        } else {
            echo "Invalid number input";
        }
    }

    /*
    Inputs tested with validate_textarea()
    No input: This input was tested to ensure that an empty answer does not get through
    "Feeback": This input was tested to ensure that a non-empty answer can get through
    */
    function validate_textarea($value){
        if ($value != NULL){
            echo "Valid textarea input";
        } else {
            echo "Invalid textarea input";
        }
    }

    $valid_password = check_password($global_password);

    if ($valid_password == TRUE){
        validate_email($_POST["email"]);
        validate_radio_buttons($_POST["age"]);
        validate_radio_buttons($_POST["recommendation"]);
        validate_options($_POST["gender"]);
        validate_numbers($_POST["times-purchased"]);
        validate_textarea($_POST["feedback"]);
    } else {
        echo "False";
        return FALSE;  
    }
?>
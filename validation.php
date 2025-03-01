<?php
    /*
    Author: Michael Meacham
    Email: mmeacha5@genesee.edu

    This file does validation and sanitization for the Pepsi survey.
    */

    /*
    Checks whether the password given in the form is the correct password and returns true or false

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
    Validates the email given in the form using the filter_var with the FILTER_VALIDATE_EMAIL filter. Returns true or false.

    Inputs tested with validate_email()

    testemail@gmail.com: This was chosen to ensure that it accepted a valid email
    testemail@gmail: This was chosen to ensure that it did not accept a format without the .com (or other similar like .net)
    */
    function validate_email($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
    Validates that the given value for a radio button is NOT null and that it is within the possible values that can be selected.
    It checks whether the value is in the given array(s) of possible values. Returns true or false.

    Inputs tested with validate_radio_buttons()

    All radio buttons in the age & pepsi recommendation fieldsets were tested to ensure that each one was allowed through
    Then through inspect element I changed one of the values and submitted it to ensure it would not get let through
    */
    function validate_radio_buttons($value){
        $valid_radio_buttons_age = array("0-12", "13-17", "18-22", "23-27", "28-32", "33-37", "38-42", "43-47", "48-52", "53-57", "58-62", "63-67", "68+");
        $valid_radio_buttons_recommendation = array("very-unlikely", "unlikely", "unsure", "likely", "very-likely");
        if ($value != NULL && (in_array($value, $valid_radio_buttons_age) || in_array($value, $valid_radio_buttons_recommendation))){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
    Validates that the given value for an option is NOT null and that it is within the possible values that can be selected.
    It checks whether the value is in the given array of possible values. Returns true or false.

    Inputs tested with validate_options()

    All options in the gender group were tested to ensure they are allowed to be passed through
    A value was changed in inspect element to make sure that this function rejected any ones that are not in the array
    */
    function validate_options($value){
        $valid_options_gender = array("male", "female", "nonbinary", "genderfluid", "agender", "other");
        if ($value != NULL && in_array($value, $valid_options_gender)){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* 
    Validates that the given number is made up of only digits. Uses the ctype_digit function. Returns a boolean.

    Inputs tested with validate_numbers()

    213: This input was tested to ensure numbers were allowed through
    The following inputs were tested by changing the input type in inspect element to ensure no non numbers were allowed through:
    2_13
    213$a
    $a
    */
    function validate_numbers($value){
        if (ctype_digit($value)){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
    Validates that the given text is NOT null. Returns a boolean

    Inputs tested with validate_textarea()

    No input: This input was tested to ensure that an empty answer does not get through
    "Feedback": This input was tested to ensure that a non-empty answer can get through
    */
    function validate_textarea($value){
        if ($value != NULL){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
    Sanitizes an email with the filter_var function and the FILTER_SANITIZE_EMAIL filter.
    */
    function sanitize_email($email){
        $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $sanitized_email;
    }

    /*
    Sanitizes a radio button value with the filter_var function and the FILTER_SANITIZE_STRING filter. Returns the sanitized value.
    */
    function sanitize_radio_buttons($value){
        $sanitized_radio_button = filter_var($value, FILTER_SANITIZE_STRING);
        return $sanitized_radio_button;
    }

    /*
    Sanitizes an option value with the filter_var function and the FILTER_SANITIZE_STRING filter. Returns the sanitized value.
    */
    function sanitize_options($value){
        $sanitized_option = filter_var($value, FILTER_SANITIZE_STRING);
        return $sanitized_option;
    }

    /*
    Sanitizes a number with the filter_var function and the FILTER_SANITIZE_NUMBER_INT filter. Returns the sanitized number.
    */
    function sanitize_numbers($value){
        $sanitized_number = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
        return $sanitized_number;
    }

    /*
    Sanitizes text with the filter_var function and the FILTER_SANITIZE_STRING filter. Returns the sanitized text.
    */
    function sanitize_text($value){
        $sanitized_text = filter_var($value, FILTER_SANITIZE_STRING);
        return $sanitized_text;
    }

    $valid_password = check_password($global_password);

    /*
    Uses if statements to check validation, and then calls sanitization functions for all data if validation checks passed.
    */
    function sanitize_all_data(){
        if (validate_email($_POST["email"]) == TRUE){
            $sanitized_email = sanitize_email($_POST["email"]);
            #echo $sanitized_email;
        }
        if(validate_radio_buttons($_POST["age"]) == TRUE){
            $sanitized_age = sanitize_radio_buttons($_POST["age"]);
            #echo $sanitized_age;
        }
        if (validate_radio_buttons($_POST["recommendation"]) == TRUE){
            $sanitized_recommendation = sanitize_radio_buttons($_POST["recommendation"]);
            #echo $sanitized_recommendation;
        }
        if (validate_options($_POST["gender"]) == TRUE){
            $sanitized_option = sanitize_options($_POST["gender"]);
            #echo $sanitized_option;
        }
        if (validate_numbers($_POST["times-purchased"]) == TRUE){
            $sanitized_number = sanitize_numbers($_POST["times-purchased"]);
            #echo $sanitized_number;
        }
        if(validate_textarea($_POST["feedback"]) == TRUE){
            $sanitized_text = sanitize_text($_POST["feedback"]);
            #echo $sanitized_text;
        }
    }
?>
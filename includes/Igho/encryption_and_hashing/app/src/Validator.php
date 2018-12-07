<?php

class Validator
{
    public function __construct()
    {
    }

    public function __destruct()
    {
    }

    public function sanitise_string($string_to_sanitise)
    {
        $sanitised_string = false;

        if (!empty($string_to_sanitise)) $sanitised_string = filter_var($string_to_sanitise, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

        return $sanitised_string;
    }

    public function sanitise_email($email_to_sanitise)
    {
        $cleaned_email = false;

        if (!empty($email_to_sanitise)) {
            $sanitised_email = filter_var($email_to_sanitise, FILTER_SANITIZE_EMAIL);
            $cleaned_email = filter_var($sanitised_email, FILTER_VALIDATE_EMAIL);

            return $cleaned_email;
        }
        else return $cleaned_email;

    }

    public function no_special_char($item_to_check)
    {
        $safe_entries = false;

        $item_to_sanitise = trim($item_to_check);

        if(!empty($item_to_sanitise) && !preg_match("/['^£$%&*()}{@#~?><>,|=_+¬-]/i", $item_to_sanitise, $match)) $safe_entries = $item_to_sanitise;

        return $safe_entries;
    }
}




<?php

class Validator
{
    public function __construct() { }

    public function __destruct() { }

    /**
     * FILTER_SANITIZE_STRING removes unwanted html tags
     *
     * @param $word_to_check
     * @return bool|mixed|string
     */

    public function validateWord($word_to_check)
    {
        $checked_word = false;

        $word_to_check = trim($word_to_check);

        if (strlen($word_to_check) > 0)
        {
            if (is_string($word_to_check))
            {
                $checked_word = filter_var($word_to_check, FILTER_SANITIZE_STRING);
            }


        }

        elseif (is_integer($word_to_check))
        {
            $checked_word = filter_var($word_to_check, FILTER_SANITIZE_NUMBER_INT);
        }

        else
        {
            $checked_word = 'none entered';
        }


        return $checked_word;
    }




}
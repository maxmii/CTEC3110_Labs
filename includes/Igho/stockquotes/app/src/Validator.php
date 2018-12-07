<?php

class Validator
{
  public function __construct() { }

  public function __destruct() { }

  public function validateCompany($company_to_check)
  {
    $checked_company = false;
    $permitted_symbol_length = 3;

    $sanitised_company = filter_var($company_to_check, FILTER_SANITIZE_STRING);
    $symbol_length = strlen($sanitised_company);

    if ($symbol_length == $permitted_symbol_length)
    {
      $checked_company = $sanitised_company;
    }
    return $checked_company;
  }
}
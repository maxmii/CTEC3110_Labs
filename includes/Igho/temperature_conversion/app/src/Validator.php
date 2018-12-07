<?php

/**
 *This php file validates the parameters entered on the form to verify that the source temperature parameter
 *matches with the source->destination option selected
 */

class Validator
{
  public function __construct() { }

  public function __destruct() { }

  public function validateTemperature($temperature_to_check)
  {
    $checked_temperature = false;

    if (isset($temperature_to_check))
    {
      $minimum_temperature_value = LOWEST_CENTIGRADE_TEMPERATURE;
      $checked_value = filter_var($temperature_to_check, FILTER_VALIDATE_FLOAT);
      if ($checked_value >= $minimum_temperature_value)
      {
        $checked_temperature = (float)$checked_value;
      }
    }
    return $checked_temperature;
  }

  public function validateWindspeed($windspeed_to_check)
  {
    $checked_temperature = false;

    if (isset($windspeed_to_check))
    {
        $minimum_windspeed_value = LOWEST_WINDSPEED;
      $checked_value = filter_var($windspeed_to_check, FILTER_VALIDATE_FLOAT);
      if ($checked_value >= $minimum_windspeed_value)
      {
        $checked_temperature = $checked_value;
      }
    }
    return $checked_temperature;
  }

  public function validateConversionType($type_to_check)
  {
    $checked_conversion_type = false;
    $arr_conversion_type = TEMP_UNITS;

    $result = array_key_exists($type_to_check, $arr_conversion_type);

    if ($result === true)
    {
      $checked_conversion_type = $type_to_check;
    }

    return $checked_conversion_type;
  }
}
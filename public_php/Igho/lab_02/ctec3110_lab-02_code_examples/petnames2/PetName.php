<?php

class PetName
{
  // declare an attribute variable
  private $c_pet_name;

  public function __construct() {}

  public function __destruct() {}

  public function set_pet_name($p_pet_name_to_store)
  {
    $this->c_pet_name = $p_pet_name_to_store;
  }

  public function get_pet_name()
  {
    return $this->c_pet_name;
  }
}

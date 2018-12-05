<?php

class Slim
{
  // declare an attribute variable
  private $c_Slim;

  public function __construct() {}

  public function __destruct() {}

  public function set_pet_name($p_slim_to_store)
  {
    $this->c_Slim = $p_slim_to_store;
  }

  public function get_pet_name()
  {
    return $this->c_Slim;
  }
}

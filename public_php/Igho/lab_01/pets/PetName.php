<?php
/**
 * Created by PhpStorm.
 * User: p16223827
 * Date: 03/10/2018
 * Time: 16:46
 */


/** must be the FIRST declaration and is ONLY file wide */
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: slim
 * Date: 25/09/17
 * Time: 22:23
 */


class PetName
{
// declare an attribute variable

    private $pet_name;
    public function __construct() {}
    public function __destruct() {}
    public function setPetName($pet_name_to_store)
    {
        $this->pet_name = $pet_name_to_store;
    }
    public function getPetName()
    {
        return $this->pet_name;
    }
}
<?php

namespace Manthan\Nuncio;

class User
{
  public $name;
  public $age;
  public $number;
  public function __construct($name, $age, $number)
  {
    $this->name = $name;
    $this->age = $age;
    $this->number = $number;
  }
}


 ?>

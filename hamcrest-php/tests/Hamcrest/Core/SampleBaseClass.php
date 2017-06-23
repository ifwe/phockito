<?php declare(strict_types=1);

class Hamcrest_Core_SampleBaseClass
{

  private $_arg;

  public function __construct($arg)
  {
    $this->_arg = $arg;
  }

  public function __toString()
  {
    return $this->_arg;
  }

}

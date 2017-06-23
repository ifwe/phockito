<?php declare(strict_types=1);

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/Description.php';

class Hamcrest_Array_FullyMatchingOnce
{

  private $_elementMatchers;
  private $_mismatchDescription;

  public function __construct(array $elementMatchers,
    Hamcrest_Description $mismatchDescription)
  {
    $this->_elementMatchers = $elementMatchers;
    $this->_mismatchDescription = $mismatchDescription;
  }

  public function matches($item, $key = null) : bool
  {
    return $this->_isNotSurplus($item) && $this->_isMatched($item, $key);
  }

  public function isFinished($items) : bool
  {
    if (empty($this->_elementMatchers))
    {
      return true;
    }

    $this->_mismatchDescription
         ->appendText('No item matches: ')->appendAssociativeArray('', ', ', '=', '', $this->_elementMatchers)
         ->appendText(' in ')->appendValueList('[', ', ', ']', $items)
         ;
    return false;
  }

  // -- Private Methods

  private function _isNotSurplus($item) : bool
  {
    if (empty($this->_elementMatchers))
    {
      $this->_mismatchDescription->appendText('Not matched: ')->appendValue($item);
      return false;
    }

    return true;
  }

  private function _isMatched($item, $key) : bool
  {
    if ($key !== null && isset($this->_elementMatchers[$key]) && $this->_elementMatchers[$key]->matches($item))
    {
      unset($this->_elementMatchers[$key]);
      return true;
    }
    $this->_mismatchDescription->appendText('Not matched: key=')->appendValue($key)->appendText(', value=')->appendValue($item);
    return false;
  }

}

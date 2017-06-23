<?php declare(strict_types=1);

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/SelfDescribing.php';

/**
 * Null implementation of {@link Hamcrest_Description}.
 */
class Hamcrest_NullDescription implements Hamcrest_Description
{

  public function appendText($text)
  {
    return $this;
  }

  public function appendDescriptionOf(Hamcrest_SelfDescribing $value)
  {
    return $this;
  }

  public function appendValue($value)
  {
    return $this;
  }

  public function appendValueList($start, $separator, $end, $values)
  {
    return $this;
  }

  public function appendList($start, $separator, $end, $values)
  {
    return $this;
  }

  public function appendAssociativeArray($start, $separator, $entryKeyValueSeparator, $end, $values)
  {
    return $this;
  }

  public function __toString()
  {
    return '';
  }

}

<?php declare(strict_types=1);
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Text/StringStartsWith.php';

class Hamcrest_Text_StringStartsWithTest extends Hamcrest_AbstractMatcherTest
{

  const EXCERPT = 'EXCERPT';

  private $_stringStartsWith;

  public function setUp()
  {
    $this->_stringStartsWith = Hamcrest_Text_StringStartsWith::startsWith(self::EXCERPT);
  }

  protected function createMatcher()
  {
    return $this->_stringStartsWith;
  }

  public function testEvaluatesToTrueIfArgumentContainsSpecifiedSubstring()
  {
    $this->assertTrue($this->_stringStartsWith->matches(self::EXCERPT . 'END'),
      'should be true if excerpt at beginning'
    );
    $this->assertFalse($this->_stringStartsWith->matches('START' . self::EXCERPT),
      'should be false if excerpt at end'
    );
    $this->assertFalse($this->_stringStartsWith->matches('START' . self::EXCERPT . 'END'),
      'should be false if excerpt in middle'
    );
    $this->assertTrue($this->_stringStartsWith->matches(self::EXCERPT . self::EXCERPT),
      'should be true if excerpt is at beginning and repeated'
    );

    $this->assertFalse($this->_stringStartsWith->matches('Something else'),
      'should be false if excerpt is not in string'
    );
    $this->assertFalse($this->_stringStartsWith->matches(substr(self::EXCERPT, 1)),
      'should be false if part of excerpt is at start of string'
    );
  }

  public function testEvaluatesToTrueIfArgumentIsEqualToSubstring()
  {
    $this->assertTrue($this->_stringStartsWith->matches(self::EXCERPT),
      'should be true if excerpt is entire string'
    );
  }

  public function testHasAReadableDescription()
  {
    $this->assertDescription('a string starting with "EXCERPT"', $this->_stringStartsWith);
  }

}

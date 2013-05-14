<?php
/**
 * @author      Aaron Lord <aaronlord1@gmail.com>
 * @copyright   (c) 2013 Aaron Lord
 */

use Griddle\Support\Str;

class StrTest extends PHPUnit_Framework_TestCase
{

    public $string = 'this is the test string';
    public $array  = array('this', 'is', 'the', 'test', 'string');
    public $studly = 'ThisIsTheTestString';
    public $camel  = 'thisIsTheTestString';

    public function testContainsString()
    {
        $bool = Str::contains($this->string, 'the');
        $this->assertTrue($bool, 'String not found in the string.');
    }

    public function testNotContainString()
    {
        $bool = Str::contains($this->string, 'greetings');
        $this->assertFalse($bool, 'String found in the string.');
    }

    public function testContainsArrayItem()
    {
        $bool = Str::contains($this->string, array('foo', 'bar', 'test'));
        $this->assertTrue($bool, 'String in array not found in the string');
    }

    public function testNotContainArrayItem()
    {
        $bool = Str::contains($this->string, array('foo', 'bar'));
        $this->assertFalse($bool, 'String in array found in the string');
    }

    public function testStartsWith()
    {
        $bool = Str::startsWith($this->string, 'this');
        $this->assertTrue($bool, 'String start not found');
    }

    public function testNotStartWith()
    {
        $bool = Str::startsWith($this->string, 'that');
        $this->assertFalse($bool, 'String found but not there');
    }

    public function testEndsWith()
    {
        $bool = Str::endsWith($this->string, 'string');
        $this->assertTrue($bool, 'String end not found');
    }

    public function testNotEndWith()
    {
        $bool = Str::endsWith($this->string, 'strings');
        $this->assertFalse($bool, 'String end found');
    }

    public function testBeforeFirst()
    {
        $start = Str::beforeFirst($this->string, ' the');
        $this->assertSame('this is', $start, 'Start of string not found');
    }

    public function testNotBeforeLast()
    {
        $string = Str::beforeFirst($this->string, 'not found');
        $this->assertSame($this->string, $string);
    }

    public function testAfterLast()
    {
        $end = Str::afterLast($this->string, 'test ');
        $this->assertSame('string', $end, 'End of string not found');
    }

    public function testNotAfterLast()
    {
        $string = Str::afterLast($this->string, 'not found');
        $this->assertSame($this->string, $string);
    }

    public function testStudly()
    {
        $studly = Str::studly($this->string);
        $this->assertSame($this->studly, $studly, 'String did not convert to studly caps');
    }

    public function testStudlyWithArray()
    {
        $studly = Str::studly($this->array);
        $this->assertSame($this->studly, $studly, 'String did not convert array to studly caps');
    }

    public function testCamel()
    {
        $camel = Str::camel($this->string);
        $this->assertSame($this->camel, $camel, 'String did not convert to camel case');
    }

}
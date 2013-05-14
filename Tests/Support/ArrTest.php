<?php
/**
 * @author      Aaron Lord <aaronlord1@gmail.com>
 * @copyright   (c) 2013 Aaron Lord
 */

use Griddle\Support\Arr;

class ArrTest extends PHPUnit_Framework_TestCase
{

    public $array = array(1 => 'apple', 2 => 'orange', 3 => 'banana', 4 =>'pear');

    public function testOnlyWithArray()
    {
        $result = Arr::only($this->array, array(1, 3));

        $this->assertSame($result, array(1 => 'apple', 3 => 'banana'),
            'Arr::only did not filter the array');
    }

    public function testOnlyWithNonArrayKey()
    {
        $result = Arr::only($this->array, 1);

        $this->assertSame($result, array(1 => 'apple'));
    }

    public function testOnlyWithNonArray()
    {
        try
        {
            $result = Arr::only('string', 1);
        }
        catch(Exception $e)
        {
            $this->fail('Arr::only failed at accepting non-array');
        }
    }

    public function testWithoutWithArray()
    {
        $result = Arr::without($this->array, array(1, 3));

        $this->assertSame($result, array(2 => 'orange', 4 => 'pear'),
            'Arr::without did not filter the array');
    }


    public function testWithoutWithNonArrayKey()
    {
        $result = Arr::without($this->array, 1);

        $this->assertSame($result, array(2 => 'orange', 3 => 'banana', 4 =>'pear'));
    }

    public function testWithoutWithNonArray()
    {
        try
        {
            $result = Arr::without('string', 1);
        }
        catch(Exception $e)
        {
            $this->fail('Arr::without failed at accepting non-array');
        }
    }

}
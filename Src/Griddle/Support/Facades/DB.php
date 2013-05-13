<?php
/**
 * @author      Aaron Lord <aaronlord1@gmail.com>
 * @copyright   (c) 2013 Aaron Lord
 */
namespace Griddle\Support\Facades;

class DB extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'database';
    }

}
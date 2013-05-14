<?php
/**
 * @author      Aaron Lord <aaronlord1@gmail.com>
 * @copyright   (c) 2013 Aaron Lord
 */

namespace Griddle\Support;

class Arr
{

    /**
     * Gets a subset of items from the array, only containing the given key(s)
     * @param  array            $array
     * @param  array|string     $keys
     * @return array
     */
    public static function only(Array $array, $keys)
    {
        return array_intersect_key($array, array_flip((array) $keys));
    }

    /**
     * Gets a subset of items from the array, without the given key(s)
     * @param  array            $array
     * @param  array|string     $keys
     * @return array
     */
    public static function without(Array $array, $keys)
    {
        return array_diff_key($array, array_flip((array) $keys));
    }

}
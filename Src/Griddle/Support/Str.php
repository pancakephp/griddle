<?php
/**
 * @author      Aaron Lord <aaronlord1@gmail.com>
 * @copyright   (c) 2013 Aaron Lord
 *
 */

namespace Griddle\Support;

class Str
{

    /**
     * Determine if a given string contains a substring.
     *
     * @param  string           $haystack
     * @param  string|array     $needle
     * @return bool
     */
    public static function contains($haystack, $needle)
    {
        foreach ((array) $needle as $n)
        {
            if (!(strpos($haystack, $n) === false))
                return true;
        }

        return false;
    }

    /**
     * Determine if a string starts with a given needle.
     *
     * @param  string   $haystack
     * @param  string   $needle
     * @return bool
     */
    public static function startsWith($haystack, $needle)
    {
        return strpos($haystack, $needle) === 0;
    }

    /**
     * Determine if a string ends with a given needle.
     *
     * @param  string   $haystack
     * @param  string   $needle
     * @return bool
     */
    public static function endsWith($haystack, $needle)
    {
        return $needle == substr($haystack, strlen($haystack) - strlen($needle));
    }

    /**
     * Get the prefix of a string before the first occurance of a given needle.
     *
     * @param  string   $haystack
     * @param  string   $needle
     * @return string
     */
    public static function beforeFirst($haystack, $needle)
    {
        if (!static::contains($haystack, $needle))
            return $haystack;

        return substr($haystack, 0, strpos($haystack, $needle));
    }

    /**
     * Get the suffix of a string after the last occurance of a given needle.
     *
     * @param  string   $haystack
     * @param  string   $needle
     * @return string
     */
    public static function afterLast($haystack, $needle)
    {
        if (!static::contains($haystack, $needle))
            return $haystack;

        return substr($haystack, strrpos($haystack, $needle) + strlen($needle));
    }

    /**
     * Convert a given string to StudlyCaps.
     * @see http://en.wikipedia.org/wiki/StudlyCaps
     *
     * @param  string|array   $str  Use \s, - or _ to seperate words in a string
     * @return string
     */
    public static function studly($str)
    {
        if (is_array($str))
        {
            $str = implode(' ', $str);
        }

        $str = ucwords(str_replace(array('-', '_'), ' ', $str));

        return str_replace(' ', '', $str);
    }

    /**
     * Convert a given string to camelCase
     * @see http://en.wikipedia.org/wiki/CamelCase
     *
     * @param  string|array   $str  Use \s, - or _ to seperate words in a string
     * @return string
     */
    public static function camel($value)
    {
        return lcfirst(static::studly($value));
    }

}
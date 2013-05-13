<?php
/**
 * @author      Aaron Lord <aaronlord1@gmail.com>
 * @copyright   (c) 2013 Aaron Lord
 */

namespace Griddle\Cipher;

class Hash
{

    public function make($value)
    {
        return 'Hash '.$value;
    }

    public function check($value, $hash)
    {

    }

}
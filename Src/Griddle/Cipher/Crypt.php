<?php
/**
 * @author      Aaron Lord <aaronlord1@gmail.com>
 * @copyright   (c) 2013 Aaron Lord
 */

namespace Griddle\Cipher;

class Crypt
{

    private static $key = '';
    private static $cipher = 'blowfish';
    private static $mode = 'cfb';
    private $td;

    /**
     * Encrypt the given value.
     *
     * @param  string   $plain
     * @return string
     */
    public function encrypt($plain)
    {
        $td = $this->td();

        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        mcrypt_generic_init($td, static::$key, $iv);

        $secret = mcrypt_generic($td, $plain);
        mcrypt_generic_deinit($td);

        return $iv.$secret;
    }

    /**
     * Decrypt the given value.
     *
     * @param  string   $secret
     * @return string
     */
    public function decrypt($secret)
    {
        $td = $this->td();

        $size   = mcrypt_enc_get_iv_size($td);
        $iv     = substr($secret, 0, $size);
        $secret = substr($secret, $size);

        mcrypt_generic_init($td, static::$key, $iv);
        $plain = mdecrypt_generic($td, $secret);

        mcrypt_generic_deinit($td);
        return $plain;
    }

    /**
     * Get the encryption descriptor.
     *
     * @return resource
     */
    private function td()
    {
        return mcrypt_module_open(static::$cipher, '', static::$mode, '');
    }

    /**
     * Sets the cipher key
     *
     * @param string    $key
     */
    public function setKey($key)
    {
        static::$key = $key;
    }

    /**
     * Sets the cipher algorithm
     *
     * @param string    $cipher
     */
    public function setCipher($cipher)
    {
        static::$cipher = $cipher;
    }

    /**
     * Sets the cipher mode
     *
     * @param string    $mode
     */
    public function setMode($mode)
    {
        static::$mode = $mode;
    }

}
<?php
/**
 * @author      Aaron Lord <aaronlord1@gmail.com>
 * @copyright   (c) 2013 Aaron Lord
 */

use Griddle\Cipher\Crypt;

class CryptTest extends PHPUnit_Framework_TestCase
{
    public $key = 'AmazinglySecureKey';
    public $plain = 'GenericPassword';
    public $crypter;

    public function setUp()
    {
        $this->crypter = new Crypt;
        $this->crypter->setKey($this->key);
    }

    public function testSetKey()
    {
        $key = PHPUnit_Framework_Assert::readAttribute($this->crypter, 'key');
        $this->assertSame($this->key, $key, 'Key did not set');
    }

    public function testSetCipher()
    {
        $orig = PHPUnit_Framework_Assert::readAttribute($this->crypter, 'cipher');
        $new  = 'newcipher';

        $this->crypter->setCipher($new);
        $cipher = PHPUnit_Framework_Assert::readAttribute($this->crypter, 'cipher');
        $this->assertSame($new, $cipher, 'Cipher did not set');

        $this->crypter->setCipher($orig);
    }

    public function testSetMode()
    {
        $orig = PHPUnit_Framework_Assert::readAttribute($this->crypter, 'mode');
        $new = 'newmode';

        $this->crypter->setMode($new);
        $mode = PHPUnit_Framework_Assert::readAttribute($this->crypter, 'mode');
        $this->assertSame($new, $mode, 'Mode did not set');

        $this->crypter->setMode($orig);
    }

    public function testEncrypt()
    {
        $secret = $this->crypter->encrypt($this->plain);

        $this->assertNotEquals($this->plain, $secret, 'Value did not encrypt');

        return $secret;
    }

    /**
     * @depends testEncrypt
     */
    public function testStuff($secret)
    {
        $plain = $this->crypter->decrypt($secret);

        $this->assertEquals($plain, $this->plain, 'Value did not decrypt');
    }

}
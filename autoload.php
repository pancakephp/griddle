<?php
/**
 * @author      Aaron Lord <aaronlord1@gmail.com>
 * @copyright   (c) 2013 Aaron Lord
 */
require __DIR__.'/SplClassLoader.php';

$loader = new SplClassLoader('src/');
$loader->register();
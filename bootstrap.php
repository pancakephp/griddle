<?php
require __DIR__.'/SplClassLoader.php';

$loader = new SplClassLoader(__DIR__.'/Src');
$loader->register();
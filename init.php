<?php

use Bookstore\Domain\Customer\CustomerFactory;
use Bookstore\Utils\Config;

function autoloader($classname) {
    $lastSlash = strpos($classname, '\\') + 1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/', $classname);
    $filename = __DIR__ . '/src/' . $directory . '.php';
    require_once($filename);
}
spl_autoload_register('autoloader');


CustomerFactory::factory('basic', 2, 'mary', 'poppins', 'mary@poppins.com');
CustomerFactory::factory('premium', null, 'james', 'bond', 'james@bond.com');

$config = Config::getInstance();
$dbConfig = $config->get('db');
var_dump($dbConfig);
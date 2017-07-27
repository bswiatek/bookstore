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

$dbConfig = Config::getInstance()->get('db');
$db = new PDO(
    'mysql:host=sql.fcliver.nazwa.pl;dbname=fcliver_1',
    $dbConfig['user'],
    $dbConfig['password']
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
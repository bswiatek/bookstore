<?php
require ("vendor/autoload.php");

use Bookstore\Utils\Config;

$dbConfig = Config::getInstance()->get('db');
$db = new PDO(
    'mysql:host=sql.fcliver.nazwa.pl;dbname=fcliver_1',
    $dbConfig['user'],
    $dbConfig['password']
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
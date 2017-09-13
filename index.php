<?php

require_once __DIR__ . '/vendor/autoload.php';

use Bookstore\Core\Db;
use Bookstore\Models\SaleModel;

$loader = new Twig_Loader_Filesystem(__DIR__ . '/views');
$twig = new Twig_Environment($loader);


$saleModel = new SaleModel(Db::getInstance());
$sale = $saleModel->get(1);
$params = ['sale' => $sale];
echo $twig->loadTemplate('sale.twig')->render($params);
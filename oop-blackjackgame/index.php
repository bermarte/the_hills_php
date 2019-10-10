<?php
declare(strict_types=1);

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

require 'classes/Product.php';
require 'classes/Discount.php';
require 'classes/Vat.php';

$vatLuxury = new Vat('Luxury', 21);
$vatFood = new Vat('Food', 21);

$products = [
    new Product('apple', 4, $vatFood, new Discount(Discount::VARIABLE, 50)),
    new Product('bed', 200,$vatLuxury),
    new Product('chair', 50, $vatLuxury),
    new Product('table', 110, $vatLuxury, new Discount(Discount::FIXED, 25)),
];

if(!isset($_GET['product'])) {
    $_GET['product'] = 0;
}

$product = $products[$_GET['product']];

if(isset($_GET['view']) && $_GET['view'] === 'shoppingbasket') {
    require 'views/shoppingbasket.php';
}
else {
    require 'views/productview.php';
}
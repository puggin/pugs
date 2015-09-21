<?php

$router->addRoute('GET', '/product', 'Product::getProduct');

$router->addRoute('POST', '/product', 'Product::postProduct');

$router->addRoute('PUT', '/product', 'Product::putProduct');

$router->addRoute('DELETE', '/product', 'Product::deleteProduct');
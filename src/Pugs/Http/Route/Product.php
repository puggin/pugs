<?php

$router->get('/product', ['Pugs\Http\Controller\Product', 'getProduct']);

$router->post('/product', ['Pugs\Http\Controller\Product', 'postProduct']);

$router->put('/product', ['Pugs\Http\Controller\Product', 'putProduct']);

$router->delete('/product', ['Pugs\Http\Controller\Product', 'deleteProduct']);
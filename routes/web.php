<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/items', 'ItemController@getItems');
$router->get('/items/{codeOrName}', 'ItemController@getItemsByCodeOrName');
$router->get('/item/{code}', 'ItemController@getItemByCode');
$router->post('/create', 'ItemController@createItem');
$router->post('/update', 'ItemController@updateItem');
$router->get('/delete/{code}', 'ItemController@deleteItem');


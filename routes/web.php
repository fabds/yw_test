<?php

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

/**
 * Index
 */
$router->get('/', 'IndexController@index');

/**
 * Test 1 Routing
 */
$router->group(['prefix' => 'test1'], function () use ($router) {

    $router->get('/', 'TestOneController@index');

    $router->post('/choose', 'TestOneController@choose');

    $router->get('/draft', 'TestOneController@draft');

    $router->get('/reset', 'TestOneController@reset');

    $router->get('/done', 'TestOneController@done');

});

/**
 * Test 2 Routing
 */
$router->group(['prefix' => 'test2'], function () use ($router) {

    $router->get('/', 'TestTwoController@index');

    $router->post('/analyze', 'TestTwoController@analyze');

});


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

$router->get('/', ['uses' => 'StudentsController@list']);
$router->post('/create', ['uses' => 'StudentsController@create']);
$router->post('/update', ['uses' => 'StudentsController@update']);
$router->get('/get_one/{id}', ['uses' => 'StudentsController@get_one']);
$router->get('/read', ['uses' => 'StudentsController@read']);
$router->post('/search', ['uses' => 'StudentsController@search']);
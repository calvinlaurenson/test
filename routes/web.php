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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api'], function () use ($router) {

  $router->get('categories/{amount}', ['uses' => 'CategoriesController@index']);

  $router->get('adverts/{amount}', ['uses' => 'AdvertsController@index']);

  $router->get('accounts/{user_id}', ['uses' => 'AccountsController@accounts']);

  $router->get('user_adverts/{user_id}/{latest}', ['uses' => 'AdvertsController@usersAdverts']);
});
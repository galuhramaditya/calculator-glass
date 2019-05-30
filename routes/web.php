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

$router->get('/', "CalculatorController@index");

$router->group(["prefix" => "material"], function () use ($router) {
    $router->get("data", "MaterialController@data");
    $router->post("create", "MaterialController@create");
    $router->patch("update", "MaterialController@update");
    $router->delete("delete", "MaterialController@delete");
});

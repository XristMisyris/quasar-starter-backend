<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

// JWT API
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Api\Controllers'], function ($api) {
        $api->post('authenticate', 'AuthenticateController@authenticate');
        $api->post('register', 'AuthenticateController@register');
        $api->post('refresh-token', 'AuthenticateController@refreshToken');

        $api->group( [ 'middleware' => ['jwt.auth'] ], function ($api) {
            $api->get('jokes', 'JokesController@index');
            $api->get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
        });
    });
});

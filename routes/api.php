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

Route::group(['middleware' => 'auth.basic.once'], function() {
    $this->get('/user', function (Request $request) {
        return $request->user();
    });

    $this->group(['namespace' => 'Member'], function () {
        $this->post('/members', 'Controller@store');
    });


    $this->post('/families', 'FamilyController@store');
});

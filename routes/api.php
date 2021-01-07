<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:api'], 'prefix' => 'v1'], function () {
    Route::get('/contato/lista', 'Api\ContactController@listData');
    Route::post('/contato/criar', 'Api\ContactController@create');
    Route::post('/contato/atualizar', 'Api\ContactController@update');
    Route::post('/contato/apagar', 'Api\ContactController@destroy');

    Route::get('/dashboard', 'Api\HomeController@getData');
});

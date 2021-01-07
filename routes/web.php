<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clearapp', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Session::flush();
    return redirect('/');
});


Route::group(['middleware' => ['guest', 'web']], function () {
    Route::get('/', 'AuthController@redirectToIndex');

    //react route
    Route::get('/login', 'AuthController@index')->name('Login');
    Route::get('/cadastro', 'AuthController@index')->name('Cadastro');

    Route::post('/login', 'AuthController@login');
    Route::post('/cadastro', 'AuthController@signup');
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', 'HomeController@logout')->name('Logout');
    Route::get('/home', 'HomeController@index')->name('Dashboard');

    //react route
    Route::get('/contato/lista', 'ContactController@index')->name('Leads');
    Route::get('/contato/novo', 'ContactController@index')->name('NewContact');
    Route::get('/contato/editar/{id}', 'ContactController@index')->name('EditContact');


});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

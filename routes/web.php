<?php

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

Route::get('/admin/', ['as' => 'login', 'uses' => 'SessionController@index']);
Route::get('/admin/login', 'SessionController@index');
Route::post('/admin/login', 'SessionController@create');
Route::get('/admin/logout', 'SessionController@destroy');

Route::get('/admin/password', 'UserController@indexPassword');
Route::post('/admin/changePassword', 'UserController@alterarSenha');

Route::resource('/admin/artist', 'ArtistController');
Route::resource('/admin/album', 'AlbumController');

Route::group(['middleware' => ['\App\Http\Middleware\RedirectIfAuthenticated']], function () {

    Route::resource('/admin/home', 'HomeController');

    Route::get('/admin/cep/cep', 'CepController@findCep');
    Route::get('/admin/cep/cidades', 'CepController@findCidades');

    Route::resource('/admin/user', 'UserController');
    
    //adicionar a permissão da rota no /app/Http/Middleware/RedirectIfAuthenticated
});

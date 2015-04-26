<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::any('erro', 'HomeController@index');

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function()
{
    Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function()
    {
        Route::get('/', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@index']); //BUSCA api/v1
        Route::get('/create', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@create']); //CRIAR api/v1/create
        Route::post('/', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@store']); //SALVAR api/v1
        Route::get('/{id}', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@show']); //BUSCAR ID api/v1/{id}
        Route::get('/{id}/edit', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@edit']); //EDITAR api/v1/{id}/edit
        Route::put('/{id}', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@update']); //ATUALIZAR api/v1/{id}
        Route::delete('/{id}', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@destroy']); //DELETE api/v1/{id}
    });
    
    Route::group(['prefix' => 'v2', 'namespace' => 'V2'], function()
    {
        Route::get('/', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@index']); //BUSCA api/v2
        Route::get('/create', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@create']); //CRIAR api/v2/create
        Route::post('/', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@store']); //SALVAR api/v2
        Route::get('/{id}', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@show']); //BUSCAR ID api/v2/{id}
        Route::get('/{id}/edit', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@edit']); //EDITAR api/v2/{id}/edit
        Route::put('/{id}', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@update']); //ATUALIZAR api/v2/{id}
        Route::delete('/{id}', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@destroy']); //DELETE api/v2/{id}
    });
});
/*
//BUSCA
Route::get('api/v1', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@index']);

//CRIAR
Route::get('api/v1/create', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@create']);

//SALVAR
Route::post('api/v1', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@store']);

//BUSCAR ID
Route::get('api/v1/{id}', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@show']);

//EDITAR
Route::get('api/v1/{id}/edit', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@edit']);

//ATUALIZAR
Route::put('api/v1/{id}', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@update']);

//DELETE
Route::delete('api/v1/{id}', ['middleware' => 'simpleauth', 'uses' => 'ServiceController@destroy']);


//Route::resource('api/v1', 'ServiceController');

/*Route::group(['prefix' => 'api'], function()
{
    Route:resource('v1', 'ServiceController');
});*/
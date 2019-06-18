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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function(){
    return view('master');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'genres'], function(){
    Route::get('/', 'GenreController@index');
    Route::get('/add','GenreController@create');
    Route::post('/add', 'GenreController@store');
    Route::get('/{id}','GenreController@showMovie');
});

Route::group(['prefix' => 'movies'], function(){
    Route::get('/', 'MovieController@index');
    Route::get('/create','MovieController@create');
    Route::post('/create','MovieController@store');
    Route::get('/{id}','MovieController@show');
     // Para hacer un UPDATE de un recurso, empezamos como siempre por la ruta
    // En este caso tenemos que pasar un ID de una pelicula ir a buscarla a la DB
    // y asi tener los datos de la misma para cargarlos en el formulario de edicion.
    // Esta es la ruta que devuelve este formulario, pero que tambien trae la pelicula.
    Route::get('/{id}/update', 'MovieController@edit');
    // Esta es la ruta que procesa el formulario de edicion. Fijense que dice PATCH.
    // Tambien podria decir PUT, son lo mismo.
    //PUT y PATCH modifican un recurso.
    Route::patch('/{id}/update','MovieController@update');
    Route::delete('/{id}','MovieController@destroy');
}); 

Route::group(['prefix'=>'directors'],function(){
    Route::get('/', 'DirectorController@index');
    Route::get('/create','DirectorController@create');
    Route::post('/create','DirectorController@store');
    Route::get('/{id}','DirectorController@show');
    Route::get('/{id}/update', 'DirectorController@edit');
    Route::patch('/{id}/update','DirectorController@update');
    Route::delete('/{id}','DirectorController@destroy');    
});

Route::group(['prefix'=>'actors'],function(){
    Route::get('/','ActorController@index');
    Route::get('/add','ActorController@create');
    Route::post('/add','ActorController@store');
    Route::get('/{id}','ActorController@show');
    Route::get('/{id}/update', 'ActorController@edit');
    Route::patch('/{id}/update','ActorController@update');
    Route::delete('/{id}','ActorController@destroy');
});

Route::group(['prefix'=>'series'], function(){
    Route::get('/','SeriesController@index');
    Route::get('/add','SeriesController@create');
    Route::post('/add','SeriesController@store');
});

Route::group(['prefix'=>'seasons'], function(){
    Route::get('/','SeasonController@index');
});

Route::group(['prefix'=>'episodes'], function(){
    Route::get('/','EpisodeController@index');
});
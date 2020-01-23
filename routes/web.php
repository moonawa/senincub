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
    return view('accueil');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/user/{id?}', function ($id="Pas de donnée") {
    return view('user', ["user"=>$id]);
});

Route::redirect('/here', '/');

//Route::get("/incube", "Incube@index");

//Route::get('/index', 'FrontController@index');

Route::get('/db', 'Users@dbCheck');

//Route::post('submit', 'Users@save');
//Route::get('User/create', 'Users@create')->name('user.create');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/search', ['uses' => 'EntrepriseController@recherche', 'as' => 'search']);

Route::resource('entreprises', 'EntrepriseController');

Route::get('/search', 'EntrepriseController@search');

Route::get('/alloue', 'EntrepriseController@alloue');


Route::resource('inscris', 'InscrisController');

Route::resource('secteurs', 'SecteurController');

Route::resource('metiers', 'MetierController');

Route::resource('clients', 'ClientController');


Route::get('eseuser','EntrepriseController@eseuser' )->name('eseuser');

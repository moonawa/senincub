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

//route pour la page d'accueil
Route::get('/', function () {
    return view('accueil');
});

Route::get('/super', function () {
    return view('superadmin');
});

Route::get('/userincube', function () {
    return view('userincube');
});

Route::get('/incube', function () {
    return view('incube');
});

Route::get('/admin', function () {
    return view('admin');
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

Route::get('/db', 'Users@dbCheck');

//debut ceci a été ajouté aprés l'installation de : php artisan make:auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// fin ceci a été ajouté aprés l'installation de : php artisan make:auth

//route pour le crud entreprises
Route::resource('entreprises', 'EntrepriseController');

//route pour la cherche par nom des entreprises
Route::get('/search', 'EntrepriseController@search');

//route pour allouer des admins aux entreprises incubés
Route::get('/alloue', 'EntrepriseController@alloue');

//route pour allouer des clients aux entreprises incubés
Route::get('/clientese', 'ClientController@clientese');

//route pour enlever le lien entre un client et une entreprise
Route::get('/detachclientese', 'ClientController@clientese');

//route pour le crud inscris
Route::resource('inscris', 'InscrisController');

//route pour le crud secteurs
Route::resource('secteurs', 'SecteurController');

//route pour le crud metier
Route::resource('metiers', 'MetierController');

//route pour le crud clients
Route::resource('clients', 'ClientController');

//route pour creer un utilisateur de role incubé à l'entreprise qu'on vient de creer
Route::get('eseuser','EntrepriseController@eseuser' )->name('eseuser');


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

use App\Notifications\Rendu;
use App\User;
use Illuminate\Support\Facades\Notification;

Route::get('/', function () {
    return view('accueil');
});
Route::get('/alert', function () {
    return view('alert');
});
Route::name ('notification.')->prefix('notification')->group(function () {
    Route::name ('index')->get ('/super', 'NotificationController@index');
    Route::name ('update')->patch ('{notification}', 'NotificationController@update');
});

//******************AUTHENTIFICATION APRES php artisan make:auth******************** */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




//******************************POUR LE SUPERADMIN ********************************/
//route pour le superadmin
Route::get('/super', function () {
    // User::find(37)->notify(new Rendu);
    // $user = user::find(1);
    // User::find(1)->notify(new Rendu);
    return view('superadmin');});

 Route::get('markAsRead', function()  {
     auth()->user()->unreadNotifications->markAsRead();
     return back();
 })->name('markRead');
//route pour enregistrer les employés
Route::get('/employe', function () {return view('registeremploye');});
//route pour le crud entreprises
Route::resource('entreprises', 'EntrepriseController');
//route pour la cherche par nom des entreprises
Route::get('/search', 'EntrepriseController@search');
//route pour creer un utilisateur de role incubé à l'entreprise qu'on vient de creer
Route::get('eseuser','EntrepriseController@eseuser' )->name('eseuser');
//route pour la page d'allocation  et dedétachement d'un employé à une entreprise
Route::get('/eseadmin', function () {return view('entreprise.entrpriseadmin');});
//route pour la fonction allouer  et détcaher des admins(employé) aux entreprises incubés
Route::get('/alloue', 'EntrepriseController@alloue');
Route::get('/detach', 'EntrepriseController@detach');
//route pour le crud clients
Route::resource('clients', 'ClientController');
//route pour la page d'allocation  et dedétachement d'un client à une entreprise
Route::get('/cliententreprise', function () {return view('client.cliententreprise');});
Route::get('/contact', function () {return view('admin.contact');});

//route pour  la fonction allouer et enlever des clients aux entreprises incubés
Route::get('/clientese', 'ClientController@clientese');
Route::get('/detachclientese', 'ClientController@detachclientese');
//route pour le crud inscris
Route::resource('inscris', 'InscrisController');
//route pour selectionner un inscris
Route::get('selectionner','InscrisController@selectionner' )->name('selectionner');
//Liste des entreprises et de leurs employés
Route::get('equipe','EntrepriseController@equipe' )->name('equipe');
//route pour créer un employe de sadarwa
Route::get('createemploye','UserController@createemploye' )->name('createemploye');
//les entreprises et leur employé
Route::get('ensemble', 'EntrepriseController@ese');
//recherche client
Route::get('searchclient', 'ClientController@searchclient');
//les clients et leurs entreprises
Route::get('ensembles', 'ClientController@ese');

Route::get('detail', 'EntrepriseController@detail')->name('detail');
//route pour le crud user
Route::resource('users', 'UserController');


//****************************POUR L'ADMIN*********************************** */
//route pour admin
Route::get('/admin', function () {
    $user = \App\User::find(2);
    $details = [
        'greeting' => 'Hi Artisan',
        'body' => 'This is our example notification tutorial',
        'thanks' => 'Thank you for visiting codechief.org!',
];

$user->notify(new \App\Notifications\Rendu($details));
    return view('admin');});
//liste des entreprises d'un employé
Route::get('ese','UserController@ese' )->name('ese');
//allouer un client à une entreprise
Route::get('/cltese', function () {return view('admin.cltese');});
//créer un client
Route::get('/cltcreate', function () {return view('admin.cltcreate');});



//****************************POUR L'INCUBE ***************************** */
//route pour le incube
Route::get('/incube', function () {return view('incube');});
//route pour enregistrer les userincube
Route::get('/userincubes', function () {return view('user.userincubecreate');});
//route pour la fonction creer un userincube de l'incube qui s'est connecté
Route::get('createuserincube','UserController@createuserincube' )->name('createuserincube');
//liste des employés d'une entreprise connectée
Route::get('employess','EntrepriseController@employess' )->name('employess');
//liste des clients d'une entreprise connectée
Route::get('clientsss','EntrepriseController@clientsss' )->name('clientsss');





//****************************POUR LE USERADMIN ************************* */
//route pour le userincube
Route::get('/userincube', function () {return view('userincube');});



//*************POUR TOUT LE MONDE ***************** */

//route pour le crud secteurs
Route::resource('secteurs', 'SecteurController');
//route pour le crud metier
Route::resource('metiers', 'MetierController');
//lister les entreprises en fonction des users consernés
Route::get('conserné','EntrepriseController@conserné' )->name('conserné');




















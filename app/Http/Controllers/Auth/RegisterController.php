<?php

namespace App\Http\Controllers\Auth;

use App\Entreprises;
use App\User;
use App\Roles;
use App\Http\Controllers\Controller;
use App\Metier;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;  
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //use ThrottlesLogins;
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $role = Roles::all();
        $metier = Metier::all();
        $entreprise = Entreprises::all();
        return view('auth.register', compact('role','metier', 'entreprise'));        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telephone' => ['required', 'string', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $role = DB::table('roles')->where('nom', 'ADMIN')->value('id');
        $metier = request('metier');
        $entreprise = request('entreprise');
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telephone' => $data['telephone'],
        ]);
        $user->roles()->attach($role); 
        $user->metiers()->attach($metier);
        $user->entreprises()->attach($entreprise);
        return $user;
    }
}

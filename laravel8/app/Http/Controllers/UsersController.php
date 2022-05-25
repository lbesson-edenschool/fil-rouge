<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
 
class UsersController extends Controller
{

    static $user = [];

    // Affiche le formulaire de connexion
    public function showLogin() 
    {
        return view('users.login');
    }

    //Fonction qui verif le login
    public static function checkLogin(){
        //condition pour verifier si c'est vide
        if(!isset(session('user')['username']) || !isset(session('user')['password'])) return false;
        //Requete qui verifie le login
        $truc = User::query()->where('login', '=', session('user')['username'])->where('password', '=', session('user')['password']);
        if($truc->first() !== null) {
            return true;
        } else return false;
    }

    //Fonction qui login
    public function login(Request $request){
        //Requete qui verifie le login pour ensuite connecter
        $truc = User::query()->where('login', '=', $request->all()['login'])->where('password', '=', DB::raw("PASSWORD('{$request->all()['password']}')"));
        if($truc->first() !== null) {
            session()->put('user', ["username" => $truc->first()['login'], "password" => $truc->first()['password']]);
            session()->save();
            return redirect('/admin/discover');
        } else return redirect(route('login'));
    }

    // Affiche le formulaire d'inscription
    public function create() 
    {
        return view('users.create');
    }

    // Gère l'inscription
    public function store(Request $request) 
    {
        //Requete pour créer un utilisateur
        User::create(["_token" => $request->all()['_token'], "id_user" => $request->all()['id_user'], "login" => $request->all()['login'], "password" => DB::raw("PASSWORD('{$request->all()['password']}')")]);
        return redirect('/login');
    }
}
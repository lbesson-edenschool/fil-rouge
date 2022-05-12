<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
 
class UsersController extends Controller
{

    static $user = [];

    public function showLogin() // Affiche le formulaire de connexion
    {
        return view('users.login');
    }

    public static function checkLogin(){
        if(!isset(session('user')['username']) || !isset(session('user')['password'])) return false;
        $truc = User::query()->where('login', '=', session('user')['username'])->where('password', '=', session('user')['password']);
        if($truc->first() !== null) {
            return true;
        } else return false;
    }

    public function login(Request $request){ // Gère la connexion
        $truc = User::query()->where('login', '=', $request->all()['login'])->where('password', '=', DB::raw("PASSWORD('{$request->all()['password']}')"));
        if($truc->first() !== null) {
            session()->put('user', ["username" => $truc->first()['login'], "password" => $truc->first()['password']]);
            session()->save();
            return redirect('/admin/discover');
        } else return redirect(route('login'));
    }

    public function create() // Affiche le formulaire d'inscription
    {
        return view('users.create');
    }

    public function store(Request $request) // Gère l'inscription
    {
        User::create(["_token" => $request->all()['_token'], "id_user" => $request->all()['id_user'], "login" => $request->all()['login'], "password" => DB::raw("PASSWORD('{$request->all()['password']}')")]);
        return redirect('/login');
    }
}
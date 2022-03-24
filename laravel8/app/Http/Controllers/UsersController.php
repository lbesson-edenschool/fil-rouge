<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
 
class UsersController extends Controller
{

    public function showLogin() // Affiche le formulaire de connexion
    {
        return view('users.login');
    }

    public function login(Request $request){ // Gère la connexion
        $truc = User::query()->where('name', '=', $request->all()['name'])->where('password', '=', $request->all()['password']);
        if($truc->first() !== null) return "Vous êtes bien connecté";
        else return 'Mauvais login';
    }

    public function create() // Affiche le formulaire d'inscription
    {
        return view('users.create');
    }

    public function store(Request $request) // Gère l'inscription
    {
        //return dd($request->all());
        User::create($request->all());
        return redirect('/login');
    }
}
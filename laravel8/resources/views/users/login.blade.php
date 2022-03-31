@extends('template')

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Connexion</p>
        </header>
        <div class="card-content">
            <div class="content">
            <form action="{{ route('api.login') }}" method="POST">
                @csrf
                    <div class="field">
                        <label class="label">Nom d'utilisateur</label>
                        <div class="control">
                          <input class="input @error('login') is-danger @enderror" type="text" name="login" placeholder="Nom d'utilisateur">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Mot de passe</label>
                        <div class="control">
                          <input class="input" type="password" placeholder="******" name="password">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                          <button class="button is-link">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
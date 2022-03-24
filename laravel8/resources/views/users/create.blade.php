@extends('template')

@section('content')
    @php
        $id = uniqid();
    @endphp
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Insciption</p>
        </header>
        <div class="card-content">
            <div class="content">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                    <input value="{{$id}}" type="hidden" name="id_user">
                    <div class="field">
                        <label class="label">Nom d'utilisateur</label>
                        <div class="control">
                          <input required class="input @error('name') is-danger @enderror" type="text" name="login" placeholder="Nom d'utilisateur">
                        </div>
                    </div>
                    
                    <div class="field">
                        <label class="label">Mot de passe</label>
                        <div class="control">
                          <input required class="input" type="text" placeholder="******" name="password">
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
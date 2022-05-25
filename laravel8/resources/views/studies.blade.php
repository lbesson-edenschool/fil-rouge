@extends('template')

@section('content')

<div class="container">

    <h1>École et formation de développeur :</h1>


    <section>
        <!-- Affichage des cartes écoles dynamiquement -->
        @foreach ($studies as $studie)
        
            <div class="card">
                
                <img src="{{ $studie->img_path }}" alt="Ecole {{$studie->title_school }}">

                <h3 class="school">{{ $studie->title_school }}</h3>

                <p> {{ $studie->content }} </p>
                
            </div>
        @endforeach
    </section>

</div>

@endsection
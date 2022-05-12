@extends('template')

@section('content')
    
    <section id="cardContainer">

        <h1>Dès qu’on pense à un développeur, on a en tête l’image du geek boutonneux, asocial, qui passe la journée dans sa chambre</h1>
        
        @foreach ($discovers as $discover)   
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h3>{{ $discover->title_discover }}</h3>
                    </div>
                    
                    <div class="flip-card-back">
                        <p>{{ $discover->content }}</p> 
                    </div>
                </div>
            </div>
        @endforeach
    </section>

@endsection



@extends('template')

@section('content')
    
    <section id="cardContainer">

        <h1>Dès qu’on pense à un développeur, on a en tête l’image du geek boutonneux, asocial, qui passe la journée dans sa chambre</h1>
        
        <?php
        for ($i=0; $i < 5; $i++) { 
        ?>
        
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <h3>Un geek boutonneux asocial ?</h3>
                </div>
                <div class="flip-card-back">
                    <p>Non, la réalité en est loin ! Désormais, les compétences recherchées chez un développeur sont évidemment techniques, mais également humaines, de plus en plus d’entreprises préfèrent un développeur assez bon,  qui a de bonnes compétences humaines, qu’un excellent développeur, mais incapable de travailler en équipe, qui ne sait pas parler aux clients.</p> 
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </section>

@endsection



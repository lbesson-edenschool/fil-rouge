@extends('template')

@section('content')

    <div class="filter">

        <p>Filtres : </p>
        <button>Prix</button>
        <button>Diplôme</button>
        <button>Lieux</button>

    </div>
    
    <?php
    
        for ($i=0; $i < 5; $i++) { 
            echo "
            <article>

                <h3>Un geek boutonneux asocial ?</h3>

                <p>Non, la réalité en est loin ! Désormais, les compétences recherchées chez un développeur sont évidemment techniques, mais également humaines, de plus en plus d’entreprises préfèrent un développeur assez bon,  qui a de bonnes compétences humaines, qu’un excellent développeur, mais incapable de travailler en équipe, qui ne sait pas parler aux clients.</p>

            </article>
            ";
        };

    ?>

@endsection
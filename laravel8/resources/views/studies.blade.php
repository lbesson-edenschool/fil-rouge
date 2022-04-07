@extends('template')

@section('content')

<div class="container">

    <div class="filter">

        <p>Filtres : </p>
        <button>Prix</button>
        <button>Diplôme</button>
        <button>Lieux</button>

    </div>

    <section><p><?php echo uniqid(); ?></p>
    
    <?php

        foreach ($studies as $studie) { ?>
        
            <div class="card">

                <img src="random">

                <h3 class="school">{{$studie->title_school }}</h3>

                <h4>Spécialité et formation :</h4>

                <p class="specialites">Assistant développeur Web / Web mobile</p>
                <p class="diplome">Diplôme Niveau 4</p>
                

            </div>

        <?php } ?>

    </section>

</div>

@endsection
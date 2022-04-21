@extends('template')

@section('content')

<div class="container">

    <div class="filter">

        <p>Filtres : </p>
        <button>Prix</button>
        <button>Diplôme</button>
        <button>Lieux</button>

    </div>

    <p><?php echo uniqid() ?></p>

    <section>

    <?php

        foreach ($studies as $studie) { ?>
        
            <div class="card">
                
                <img src="{{ $studie->img_path }}">

                <h3 class="school">{{$studie->title_school }}</h3>

                <p> {{ $studie->content }} </p> 
                
            </div>

        <?php } ?>

    </section>

</div>

@endsection
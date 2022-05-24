@extends('template')

@section('content')

<div class="container">

    <h1>Les écoles :</h1>


    <section>

    <?php

        foreach ($studies as $studie) { ?>
        
            <div class="card">
                
                <img src="{{ $studie->img_path }}" alt="Ecole {{$studie->title_school }}">

                <h3 class="school">{{$studie->title_school }}</h3>

                <p> {{ $studie->content }} </p> 
                
            </div>

        <?php } ?>

    </section>

</div>

@endsection
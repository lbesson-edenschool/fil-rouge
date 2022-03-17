@extends('template')

@section('content')
    <div class="banner">
        <h2>dev</h2>
        <img src="../img/logo_devfutur.webp" alt="logo du site">
        <h2>futur</h2>
    </div>
    <div class="articles">
        <article>
            <h3>Qu'est-ce que le métier de développeur ?</h3>
            <p>Le développeur, contrairement à ce que l'on peut penser, pas les 0 et les 1 qui défilent sur l'écran, il écrit des instructions bien plus compréhensibles, qui, à la fin, forment un site, un logiciel, ou un jeu, derrière chaque site, chaque programme que l'on utilise sur un appareil électronique, se cache du code.</p>
            <a class="direct" href="/discover">Envie d'en savoir plus ?</a>
        </article>
        <div class="espace"></div>
        <article>
            <h3>Quelles études  faire ?</h3>
            <p>Le métier de développeur est accessible dès la 3e et ne requiert pas de connaissances particulières en informatique, on apprend tout de A à Z, pas de panique, il ne faut pas être un prodige des maths, ni un petit geek !</p>
            <div class="btn">
                <a class="direct" href="#">Envie de t'essayer à ce metier ?</a><a class="direct" href="studies">Envie de t'orienter dans cette brance ?</a>
            </div>
        </article>
    </div>
@endsection
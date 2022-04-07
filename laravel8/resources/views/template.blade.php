<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/a1d607b151.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Poppins&display=swap" rel="stylesheet">
    <link href="{{ asset('../css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('../css/style.css') }}" rel="stylesheet">
    <title>DevFutur.fr - Fil Rouge</title>
</head>
<body>
    <header>
        <nav>
            <i class="fas fa-bars"></i>
            <ul>
                <li><a href="/">DevFutur.fr</a></li>
                <li><a href="/discover">Découvrir le métier de développeur</a></li>
                <li><a href="/game">Se mettre dans la peau d'un développeur</a></li>
                <li><a href="/studies">Quelles études faire ?</a></li>
            </ul>
        </nav>
    </header>
    <main class="section">
        @yield('content')
    <main>

</body>
</html>
@extends('template')

@section('content')

    <div id="game">

        <div id="top">

            <p id="consigne">< INSTRUCTION N°1 > Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit doloremque nisi iure </p>

        </div>

        <div id="bottom">

            <div id="code">

                <input type="text" id="code" name="code" placeholder="Function test () {...}">

            </div>

            <div id="buttons">

                <button id="quitter">Quitter</button>
                <button id="reset">Reset</button>
                <button id="send">Envoyer</button>

            </div>

        </div>

    </div>

@endsection
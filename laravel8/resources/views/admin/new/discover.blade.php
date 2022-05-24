@extends('template')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div id="admin"> 
    <h1>Panel admin | Discover</h1>
                
    <form action="/admin/new/discover" method="post">
        <label for="title">Titre</label>
        <textarea name="title" id="" cols="30" rows="10"></textarea>
        <label for="content">Contenu</label>
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        @csrf
        <input type="submit" value="Enregistrer">

    </form>
</div>
@endsection
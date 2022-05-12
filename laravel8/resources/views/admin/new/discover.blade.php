@extends('template')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div id="admin"> 
    <h1>Panel admin | Discover</h1>
                
    <form action="/admin/new/discover" method="post">
        <label for="title">Titre</label>
        <input name="title" id="">
        <label for="content">Contenue</label>
        <input name="content" id="">
        @csrf
        <input type="submit" data-id="" value="Enregistrer">
    </form>
</div>

@endsection
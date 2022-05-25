@extends('template')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<nav class="admin_nav">
    <ul>
        <li>
            NAVIGATION
        </li>
        <li>
            <a href="/admin/studies">Studies</a>
        </li>
        <li>
            <a href="/admin/discover">Discover</a>
        </li>
    </ul>
</nav>
<div id="admin"> 
    <div class="center">  
        <h1>Panel admin | Discover</h1>
        <a class="add" href="/admin/new/discover">New article</a>
    </div>
    <table id="admin_table">
        <thead>
            <tr>
                <td>Title</td>
                <td>Content</td>
                <td>edit</td>
                <td>delete</td>
            </tr>
        </thead>
        <tbody>
        <!-- Affichage des cartes discover pour les modifications/suppression/ajout dans la page admin -->
        @foreach ($discovers as $discover) 
            <tr>
                <td><textarea name="title" id="{{ $discover->id_discover }}_title" cols="30" rows="10">{{ $discover->title_discover }}</textarea></td>
                <td><textarea name="content" id="{{ $discover->id_discover }}_content" cols="30" rows="10">{{ $discover->content }}</textarea></td>
                <td>
                    <input type="hidden" name="idEdit" value="{{ $discover->id_discover }}">
                    <input type="hidden" name="idContent" value="{{ $discover->id_content }}">
                    <input type="submit" data-id="{{ $discover->id_discover }}" value="Edit">
                </td>   
                <td>
                    <form method="post" action="/admin/deleteDiscover">
                        @csrf
                        <input type="hidden" name="idDelete" value="{{ $discover->id_discover }}">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>
    //On récupère chaque input avec la value "Edit" et lors d'un clique on défini le titre, contenu, image, idContent et l'id
    $('input[value="Edit"]').each((_,x) => {
        $(x).on('click', _ => {
            let data = {
                title: $(`#${$(x).attr("data-id")}_title`).val(),
                content: $(`#${$(x).attr("data-id")}_content`).val(),
                idContent: $(x).parent().children('input[name="idContent"]').val(),
                id: $(x).attr("data-id"),
            }
            //Une requète ajax qui redirige à la page editDiscover
            $.ajax({
                url: "/api/admin/editDiscover",
                method: "post",
                headers: {
                    "X-CSRF-TOKEN": "<?= csrf_token() ?>"
                },
                data
            }).then(res => {
                console.log(res)
            }).catch(err => {
                console.log(err)
            })
        })
    })
</script>

@endsection
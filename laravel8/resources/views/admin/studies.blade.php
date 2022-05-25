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

        
        <h1>Panel admin | Studies</h1>

        <a class="add" href="/admin/new/studies">New article</a>
        

    </div>

    <table id="admin_table">
        <thead>
            <tr>
                <td>Title</td>
                <td>Lien de l'image</td>
                <td>Content</td>
                <td>edit</td>
                <td>delete</td>
            </tr>
        </thead>
        <tbody>
            <!-- Affichage des cartes des écoles pour les modifications/suppression/ajout dans la page admin -->
            @foreach ($studies as $studie)
                <tr>
                    <td><textarea type="text" id="{{ $studie->id_cards_school }}_title" name="title" cols="30" rows="10">{{$studie->title_school }}</textarea>
                    <td><textarea type="text" id="{{ $studie->id_cards_school }}_img" name="img" cols="30" rows="10">{{$studie->img_path }}</textarea>
                    <td><textarea type="text" id="{{ $studie->id_cards_school }}_content" name="content" cols="30" rows="10">{{$studie->content }}</textarea>
                    <td>
                        <input type="hidden" name="idEdit" value="{{ $studie->id_cards_school }}">
                        <input type="hidden" name="idContent" value="{{ $studie->id_content }}">
                        <input type="submit" data-id="{{ $studie->id_cards_school }}" value="Edit">
                    </td>
                
                    <td>
                        <form method="post" action="/admin/deleteStudies">
                            @csrf
                            <input type="hidden" name="idDelete" value="{{ $studie->id_cards_school }}">
                            <input type="submit" value="Delete">
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script>
    //On récupère chaque input avec la value "Edit" et lors d'un clique on défini le titre, contenu, idContent et l'id
    $('input[value="Edit"]').each((_,x) => {
        $(x).on('click', _ => {
            let data = {
                title: $(`#${$(x).attr("data-id")}_title`).val(),
                content: $(`#${$(x).attr("data-id")}_content`).val(),
                imgPath: $(`#${$(x).attr("data-id")}_img`).val(),
                idContent: $(x).parent().children('input[name="idContent"]').val(),
                id: $(x).attr("data-id"),
            }
            //Une requète ajax qui redirige à la page editStudies
            $.ajax({
                url: "/api/admin/editStudies",
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
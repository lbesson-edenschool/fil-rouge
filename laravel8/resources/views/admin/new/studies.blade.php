@extends('template')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div id="admin"> 

    <h1>Panel admin | Studies</h1>
                
    <form action="/admin/new/studies" method="post">

        <label for="title">Titre</label>
        <textarea name="title" id="" cols="30" rows="10"></textarea>

        <label for="image">Adresse de l'image</label>
        <textarea name="image" id="" cols="30" rows="10"></textarea>

        <label for="content">Contenue</label>
        <textarea name="content" id="" cols="30" rows="10"></textarea>

        @csrf
        
        <input type="submit" data-id="" value="Enregistrer">

    </form>

</div>

<script>
    $('input[value="Edit"]').each((_,x) => {
        $(x).on('click', _ => {
            let data = {
                title: $(`#${$(x).attr("data-id")}_title`).val(),
                content: $(`#${$(x).attr("data-id")}_content`).val(),
            }
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
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
        <input type="submit" value="Enregistrer">

    </form>
</div>
<script>
    $('input[value="Enregistrer"]').each((_,x) => {
        $(x).on('click', _ => {
            let data = {
                title: $(`#${$(x).attr("data-id")}_title`).val(),
                content: $(`#${$(x).attr("data-id")}_content`).val(),
            }
            $.ajax({
                url: "/api/admin/newDiscover",
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
@extends('template')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div id="admin"> 
    <h1>Panel admin | Discover</h1>
    
    <a href="/admin/new/discover">New article</a>
    <table id="admin_table">
        <tr>
            <td>Title</td>
            <td>Content</td>
            <td>Action</td>
        </tr>
        <?php foreach ($discovers as $discover) {
            //dd($discover); ?>
            <tr>
                <td><textarea name="title" id="{{ $discover->id_discover }}_title" cols="30" rows="10">{{ $discover->title_discover }}</textarea></td>
                <td><textarea name="content" id="{{ $discover->id_discover }}_content" cols="30" rows="10">{{ $discover->content }}</textarea></td>
                <td>
                    <input type="hidden" name="idEdit" value="{{ $discover->id_discover }}">
                    <input type="hidden" name="idContent" value="{{ $discover->id_content }}">
                    <input type="submit" data-id="{{ $discover->id_discover }}" value="Edit">

                    <form method="post" action="/admin/deleteDiscover">
                        @csrf
                        <input type="hidden" name="idDelete" value="{{ $discover->id_discover }}">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<script>
    $('input[value="Edit"]').each((_,x) => {
        $(x).on('click', _ => {
            let data = {
                title: $(`#${$(x).attr("data-id")}_title`).val(),
                content: $(`#${$(x).attr("data-id")}_content`).val(),
                idContent: $(x).parent().children('input[name="idContent"]').val(),
                id: $(x).attr("data-id"),
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
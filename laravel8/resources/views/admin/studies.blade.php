@extends('template')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div id="admin">
    
    <h1>Panel admin | Studies</h1><button>New article</button>

    <table id="admin_table">
        <thead>
            <tr>
                <td>Title</td>
                <td>Image</td>
                <td>Content</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
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
    $('input[value="Edit"]').each((_,x) => {
        $(x).on('click', _ => {
            let data = {
                title: $(`#${$(x).attr("data-id")}_title`).val(),
                content: $(`#${$(x).attr("data-id")}_content`).val(),
                imgPath: $(`#${$(x).attr("data-id")}_img`).val(),
                idContent: $(x).parent().children('input[name="idContent"]').val(),
                id: $(x).attr("data-id"),
            }
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
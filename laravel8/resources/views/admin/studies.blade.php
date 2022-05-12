@extends('template')

@section('content')

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
                    <td><textarea type="text" name="title" cols="30" rows="10">{{$studie->title_school }}</textarea>
                    <td><textarea type="text" name="content" cols="30" rows="10">{{$studie->img_path }}</textarea>
                    <td><textarea type="text" name="btn_content" cols="30" rows="10">{{$studie->content }}</textarea>
                    <td><button>Edit</button>
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

@endsection
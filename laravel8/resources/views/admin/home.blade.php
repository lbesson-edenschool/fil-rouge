@extends('template')

@section('content')

<div id="admin">
    
    <h1>Panel admin | Home</h1><button>New article</button>

    <table id="admin_table">

        <tr>

            <td>ID</td>
            <td>Title</td>
            <td>Content</td>
            <td>BTN Content</td>
            <td>Action</td>
            <td>Action</td>

        </tr>

        <?php for ($i=1; $i < 10 ; $i++) { ?>

        <tr> <!-- Dynamique ( boucle ) -->

            <td><?php echo $i ?></td>
            <td><input type="text" name="title"></td>
            <td><input type="text" name="content"></td>
            <td><input type="text" name="btn_content"></td>
            <td><button>Edit</button></td>
            <td><button>Delete</button></td>

        </tr>

        <?php } ?>

    </table>

</div>

@endsection
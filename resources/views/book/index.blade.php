@extends("layouts.librarian")

@section("title", "Librarian - Book List")

@section("content")
@if (false)
    <span>There is no registered book.</span>
@else
    <div class="table-responsive">
        <h3> Book List <span class="label label-danger">{{count($books)}}<span></h3>
        <a href="book/add">
            <button id="tableUstuBtn" class="btn btn-success right" type="button"><span class="glyphicon glyphicon-plus"></span> Add Book </button>
        </a>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Publisher</th>
                <th>Edit | Delete</th>
            </tr>
            @foreach($books as $book)
            <tr>
                <td>{{$book->KitapSeviyeNo}}-{{$book->KitapNo}}</td>
                <td>{{$book->KitapAdi}}</td>
                <td>{{$book->YazarAdi}}</td>
                <td>{{$book->YayinEvi}}</td>
                <td>
                    <a href="book/edit/{{$book->KitapSeviyeNo}}-{{$book->KitapNo}}">
                        <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-edit"></span> Edit </button>
                    </a>
                    <a href="book/remove/{{$book->KitapSeviyeNo}}-{{$book->KitapNo}}">
                        <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-remove"></span> Remove </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
        <h1>sayfalama</h1>
    </div><!-- .table-responsive sonu -->
@endif
@endsection
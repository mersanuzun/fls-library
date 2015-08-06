@extends("layouts.main")

@section("title", "Search")
@section("content")
<h3>Search Result (3)</h3>
<div class='row' id='content'>
    <div class="container">
        <!-- Table -->
        <table class="table table-striped">
            <tr>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Publisher</th>
                <th>Book Level</th>
                <th>Available on</th>
            </tr>
            @foreach($books as $book)
            <tr>
                <td>{{$book->KitapAdi}}</td>
                <td>{{$book->YazarAdi}}</td>
                <td>{{$book->YayinEvi}}</td>
                <td>{{$book->SeviyeAdi}} ({{$book->SeviyeNo}})</td>
                <td>>@if($book->VarMi) 'NOW' @else {{$book->PlanlananVerilisTarihi}} @endif</td>
            </tr>
            @endforeach
        </table>
        <h1>Sayfalama</h1>
    </div>
</div>
@endsection
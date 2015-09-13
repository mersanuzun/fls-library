@extends("layouts.main")

@section("title", "Search")
@section("content")
<?php
//echo $_GET[page];
//echo $_POST[page];
//!isset($_GET['page']) ? $_GET['page'] = 1 : $_GET['page']; 
?>
@if (false)
    <span>There is no such that book.</span>
@else
<div class="col-md-12 table-responsive">
    <h3> Search Result <span class="label label-danger">{{$booksNumber}}</span></h3>
    <!-- Table -->
    <table class="table table-striped" style="width: 100%;">
        <tr>
            <th>Book Name</th>
            <th>Book Level</th>
            <th>Available on</th>
        </tr>
        @foreach($books as $book)
        <tr>
            <td>{{$book->KitapAdi}}</td>
            <td>{{$book->SeviyeAdi}} ({{$book->SeviyeNo}})</td>
            <td>@if($book->VarMi) {{'NOW'}} @else {{$book->PlanlananVerilisTarihi}} @endif</td>
        </tr>
        @endforeach
    </table>
    @if (session("searchType") == "araButonuKitap")
        {!! $books->appends(["searchButton" => "bookName"])->render() !!}
    @elseif (session("searchType") == "araButonuSeviye")
        {!! $books->appends(["searchButton" => "bookLevel"])->render() !!}
    @elseif (session("searchType") == "araButonuSeviye")
        {!! $books->appends(["searchButton" => "bookAuther"])->render() !!}
    @endif
    
</div>
@endif
@endsection
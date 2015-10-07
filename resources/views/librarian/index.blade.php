@extends("layouts.librarian")


@section("title", "Librarian")


@section("content")
@if (count($undelivered) === 0)
<span>There is no undelivered book.</span>
@else
<div class="table-responsive">
    <h3> Undelivered Book List <span class="label label-danger">{{count($undelivered)}}</span></h3>
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>Student Number</th>
            <th>Student Name</th>
            <th>Book</th>
            <th>Book Name</th>
            <th>Loan Date</th>
            <th>Estimated Deliver Date</th>
        </tr>
        @foreach($undelivered as $student)
        <tr>
            <td>{{$student->OgrenciNo}}</td>
            <td>{{$student->OgrenciAdi}} {{$student->OgrenciSoyadi}}</td>
            <td>{{$student->KitapSeviyeNo}}-{{$student->KitapNo}}</td> 
            <td>{{$student->KitapAdi}}</td>
            <td>{{$student->VerilisTarihi}}</td>
            <td>{{$student->PlanlananVerilisTarihi}}</td>  
        </tr>    
        @endforeach
    </table>
    {!! $undelivered->render() !!}
</div>
@endif
@endsection
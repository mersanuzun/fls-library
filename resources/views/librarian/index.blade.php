@extends("layouts.librarian")


@section("title", "Librarian")


@section("content")
@if (count($undelivered) === 0)
<span>There is no undelivered book.</span>
@else
<div class="table-responsive">
    <h3> Department List <span class="label label-danger">{{count($undelivered)}}</span></h3>
    <a href="department/add">
        <button id="tableUstuBtn" class="btn btn-success right" type="button"><span class="glyphicon glyphicon-plus"></span> Add Department </button>
    </a>
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>Student Number</th>
            <th>Student Name</th>
            <th>Book</th>
            <th>Loan Date</th>
            <th>Estimated Deliver Date</th>
        </tr>
        @foreach($undelivered as $student)
        <tr>
            <td>{{$student->OgrenciNo}}</td>
            <td>{{$student->OgrenciAdi}}</td>
            <td>{{$student->KitapAdi}}</td> 
            <td>{{$student->VerilisTarihi}}</td>
            <td>{{$student->PlanlananVerilisTarihi}}</td>  
        </tr>    
        @endforeach


    </table>
    <h1>sayfalama</h1>
</div><!-- .table-responsive sonu -->
@endif
@endsection